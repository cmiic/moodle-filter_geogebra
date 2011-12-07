<?php
/*
* GeoGebra Moodle filter
* Copyright (C) 2009 Sara Arjona, Florian Sonner, Christoph Reinisch
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * GeoGebra filter local settings
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


//not all of the admin-settings are included here since urljar and java-arguments should only be used by admins

class geogebra_filter_local_settings_form extends filter_local_settings_form {
	protected function definition_inner($mform) {
        global $CFG;
        
        require_once($CFG->dirroot.'/filter/geogebra/lib.php');
        $ggbparams = filter_geogebra_get_params();
        
        $stroff = get_string('off', 'filters');
	    $stron = get_string('on', 'filters');
	    $strdefaultoff = get_string('defaultforsite', 'filter_geogebra') . ' ('.$stroff.')';
	    $strdefaulton = get_string('defaultforsite', 'filter_geogebra') . ' ('.$stron.')';
	    $choices = array();
	    //get all default choices
	    //the "''=>" is a little terrifying - but at least it unsets the setting
	    foreach ($ggbparams as $value) {
	    	$choices[$value] = array(
	    		''=>(($CFG->$value === "true")? $strdefaulton : $strdefaultoff) , 
	    		'true' => $stron, 
	    		'false' => $stroff
	    	);
	    }
	    $choices['filter_geogebra_use_objecttag'] = array(
    		''=>(($CFG->filter_geogebra_use_objecttag === "true")? $strdefaulton : $strdefaultoff) , 
    		'true' => $stron, 
    		'false' => $stroff
	    );
	    
		 
	    $mform->addElement('header', 'filter_geogebra_dimensions', get_string('dimensionsheading', 'filter_geogebra'));
    	$mform->addHelpButton('filter_geogebra_dimensions','localdimensheading','filter_geogebra');
    	$mform->addElement('text', 'filter_geogebra_width', get_string('width', 'filter_geogebra'), array('size' => 20));
        $mform->setType('filter_geogebra_width', PARAM_RAW);
        $mform->addElement('text', 'filter_geogebra_height', get_string('height', 'filter_geogebra'), array('size' => 20));
        $mform->setType('filter_geogebra_height', PARAM_RAW);

        //Functionality
        $mform->addElement('header', 'filter_geogebra_functionality', get_string('functionalityheading', 'filter_geogebra'));
        
        $mform->addElement('select', 'filter_geogebra_enable_rightclick', get_string('enable_rightclick','filter_geogebra'), $choices['filter_geogebra_enable_rightclick']);
       	$mform->addHelpButton('filter_geogebra_enable_rightclick', 'enable_rightclick', 'filter_geogebra');
        
       	$mform->addElement('select', 'filter_geogebra_enable_labeldrags', get_string('enable_labeldrags','filter_geogebra'), $choices['filter_geogebra_enable_labeldrags']);
       	$mform->addHelpButton('filter_geogebra_enable_labeldrags', 'enable_labeldrags', 'filter_geogebra');
       	
        $mform->addElement('select', 'filter_geogebra_show_reseticon', get_string('show_reseticon','filter_geogebra'), $choices['filter_geogebra_show_reseticon']);
       	$mform->addHelpButton('filter_geogebra_show_reseticon', 'show_reseticon', 'filter_geogebra');
       	
        $mform->addElement('select', 'filter_geogebra_framepossible', get_string('framepossible','filter_geogebra'), $choices['filter_geogebra_framepossible']);
       	$mform->addHelpButton('filter_geogebra_framepossible', 'framepossible', 'filter_geogebra');

        //User Interface
        $mform->addElement('header', 'filter_geogebra_interface', get_string('interfaceheading', 'filter_geogebra'));
        $mform->addElement('select', 'filter_geogebra_show_menubar', get_string('show_menubar','filter_geogebra'), $choices['filter_geogebra_show_menubar']);
       	$mform->addHelpButton('filter_geogebra_show_menubar', 'show_menubar', 'filter_geogebra');
       	
        $mform->addElement('select', 'filter_geogebra_show_toolbar', get_string('show_toolbar','filter_geogebra'), $choices['filter_geogebra_show_toolbar']);
       	$mform->addHelpButton('filter_geogebra_show_toolbar', 'show_toolbar', 'filter_geogebra');
       	
        $mform->addElement('select', 'filter_geogebra_show_toolbarhelp', get_string('show_toolbarhelp','filter_geogebra'), $choices['filter_geogebra_show_toolbarhelp']);
       	$mform->addHelpButton('filter_geogebra_show_toolbarhelp', 'show_toolbarhelp', 'filter_geogebra');
       	
        $mform->addElement('select', 'filter_geogebra_show_algebrainput', get_string('show_algebrainput','filter_geogebra'), $choices['filter_geogebra_show_algebrainput']);
       	$mform->addHelpButton('filter_geogebra_show_algebrainput', 'show_algebrainput', 'filter_geogebra');

       	$mform->addElement('select', 'filter_geogebra_show_animationbutton', get_string('show_animationbutton','filter_geogebra'), $choices['filter_geogebra_show_animationbutton']);
       	$mform->addHelpButton('filter_geogebra_show_animationbutton', 'show_animationbutton', 'filter_geogebra');
        
       	//Language specific Options
       	$mform->addElement('header', 'filter_geogebra_language', get_string('languageheading', 'filter_geogebra'));
       	$mform->addElement('text', 'filter_geogebra_iso_language', get_string('iso_language','filter_geogebra'));
       	$mform->addHelpButton('filter_geogebra_iso_language', 'iso_language', 'filter_geogebra');
        
       	$mform->addElement('text', 'filter_geogebra_iso_country', get_string('iso_country','filter_geogebra'));
       	$mform->addHelpButton('filter_geogebra_iso_country', 'iso_country', 'filter_geogebra');
        
       	//Miscellaneous Options 
       	$mform->addElement('header', 'filter_geogebra_miscellaneous', get_string('miscellaneousheading', 'filter_geogebra'));
       	$mform->addElement('select', 'filter_geogebra_error_dialogs', get_string('error_dialogs','filter_geogebra'), $choices['filter_geogebra_error_dialogs']);
       	$mform->addHelpButton('filter_geogebra_error_dialogs', 'error_dialogs', 'filter_geogebra');
        
       	$mform->addElement('select', 'filter_geogebra_use_browserforjs', get_string('use_browserforjs','filter_geogebra'), $choices['filter_geogebra_use_browserforjs']);
       	$mform->addHelpButton('filter_geogebra_use_browserforjs', 'use_browserforjs', 'filter_geogebra');
       
       	$mform->addElement('select', 'filter_geogebra_allow_rescaling', get_string('allow_rescaling','filter_geogebra'), $choices['filter_geogebra_allow_rescaling']);
       	$mform->addHelpButton('filter_geogebra_allow_rescaling', 'allow_rescaling', 'filter_geogebra');
        
       	$mform->addElement('text', 'filter_geogebra_on_initparam', get_string('on_initparam','filter_geogebra'));
       	$mform->addHelpButton('filter_geogebra_on_initparam', 'on_initparam', 'filter_geogebra');
        
       	$mform->addElement('select', 'filter_geogebra_show_button', get_string('show_button','filter_geogebra'), $choices['filter_geogebra_show_button']);
       	$mform->addHelpButton('filter_geogebra_show_button', 'show_button', 'filter_geogebra');
        
       	//HTML specific options 
       	$mform->addElement('select', 'filter_geogebra_use_objecttag', get_string('use_objecttag','filter_geogebra'), $choices['filter_geogebra_use_objecttag']);
       	$mform->addHelpButton('filter_geogebra_use_objecttag', 'use_objecttag', 'filter_geogebra');
              	
       	$mform->addElement('text', 'filter_geogebra_id', get_string('embed_id','filter_geogebra'));
       	$mform->addHelpButton('filter_geogebra_id', 'embed_id', 'filter_geogebra');
        
       	$mform->addElement('text', 'filter_geogebra_class', get_string('embed_class','filter_geogebra'));
       	$mform->addHelpButton('filter_geogebra_class', 'embed_class', 'filter_geogebra');
       
       	
       	
       	
    }
}

