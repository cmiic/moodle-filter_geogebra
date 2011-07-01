<?php
require_once('ggbparamslib.php');

class geogebra_filter_local_settings_form extends filter_local_settings_form {
	protected function definition_inner($mform) {
        global $CFG;
        global $ggbparams;
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
	    		'false' => $stroff);
	    }
	    	    
	    $mform->addElement('header', 'filter_geogebra_dimensions', get_string('dimensionsheading', 'filter_geogebra'));
    	$mform->addElement('text', 'filter_geogebra_width', get_string('width', 'filter_geogebra'), array('size' => 20));
        $mform->setType('filter_geogebra_width', PARAM_RAW);
        $mform->addElement('text', 'filter_geogebra_height', get_string('height', 'filter_geogebra'), array('size' => 20));
        $mform->setType('filter_geogebra_height', PARAM_RAW);
        //$mform->closeHeaderBefore('filter_geogebra_functionality');
        
        $mform->addElement('header', 'filter_geogebra_functionality', get_string('functionalityheading', 'filter_geogebra'));
        
        $mform->addElement('select', 'filter_geogebra_enable_rightclick', get_string('enable_rightclick','filter_geogebra'), $choices['filter_geogebra_enable_rightclick']);
       	$mform->addHelpButton('filter_geogebra_enable_rightclick', 'enable_rightclick', 'filter_geogebra');
        
       	$mform->addElement('checkbox', 'filter_geogebra_enable_labeldrags', get_string('enable_labeldrags','filter_geogebra'));
        $mform->addElement('checkbox', 'filter_geogebra_show_reseticon', get_string('show_reseticon','filter_geogebra'));
        $mform->addElement('checkbox', 'filter_geogebra_framepossible', get_string('framepossible','filter_geogebra'));
        $mform->closeHeaderBefore('filter_geogebra_interface');
        
        $mform->addElement('header', 'filter_geogebra_interface', get_string('interfaceheading', 'filter_geogebra'));
        $mform->addElement('checkbox', 'filter_geogebra_show_menubar', get_string('show_menubar','filter_geogebra'));
        $mform->addElement('checkbox', 'filter_geogebra_show_toolbar', get_string('show_toolbar','filter_geogebra'));
        $mform->addElement('checkbox', 'filter_geogebra_show_toolbarhelp', get_string('show_toolbarhelp','filter_geogebra'));
        $mform->addElement('checkbox', 'filter_geogebra_show_algebrainput', get_string('show_algebrainput','filter_geogebra'));
                
    }
}

