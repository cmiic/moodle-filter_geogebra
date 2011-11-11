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
 * GeoGebra filter settings
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

	$settings->add(new admin_setting_heading('filter_geogebra_enable', get_string('enableheading', 'filter_geogebra'), get_string('enableheading_help', 'filter_geogebra')));
	//By default we will enable the filter for ggb, ggt
	//I think geogebratube is not needed because it provides a embed option
	//TODO: On the other hand it may be convenient to embed the ggbbase64 if we are on a secure connection
	//$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_geogebratube', get_string('sitegeogebratube','filter_geogebra'), get_string('sitegeogebratube_help','filter_geogebra'), 1));

	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_ggb', get_string('ggbfile','filter_geogebra'), get_string('ggbfile_help','filter_geogebra'), 1));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_ggt', get_string('ggtfile','filter_geogebra'), get_string('ggtfile_help','filter_geogebra'), 1));


	$settings->add(new admin_setting_heading('filter_geogebra_dimensions', get_string('dimensionsheading', 'filter_geogebra'), get_string('dimensionsheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configtext('filter_geogebra_width', get_string('width','filter_geogebra'), get_string('width_help','filter_geogebra'), "600"));
	$settings->add(new admin_setting_configtext('filter_geogebra_height', get_string('height','filter_geogebra'), get_string('height_help','filter_geogebra'), "400"));

	//Jars
	$settings->add(new admin_setting_heading('filter_geogebra_jar', get_string('jarheading', 'filter_geogebra'), get_string('jarheading_help', 'filter_geogebra')));

	$urls_to_jars = array(
		'http://www.geogebra.org/webstart/4.0/' => get_string('geogebra_latest', 'filter_geogebra'),
		'http://www.geogebra.org/webstart/4.0/' => get_string('geogebra_external40', 'filter_geogebra'),
		'http://www.geogebra.org/webstart/4.2/' => get_string('geogebra_external42', 'filter_geogebra'),
		'http://www.geogebra.org/webstart/3.2/' => get_string('geogebra_external32', 'filter_geogebra'),
		$CFG->wwwroot.'/filter/geogebra/32/' => get_string('geogebra_local32', 'filter_geogebra'),
		$CFG->wwwroot.'/filter/geogebra/40/' => get_string('geogebra_local', 'filter_geogebra')
	);
	$settings->add(new admin_setting_configselect('filter_geogebra_urljar', get_string('urljar','filter_geogebra'), get_string('urljar_help','filter_geogebra'), 'geogebra_latest', $urls_to_jars));

	//Functionality
	$settings->add(new admin_setting_heading('filter_geogebra_functionality', get_string('functionalityheading', 'filter_geogebra'), get_string('functionalityheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_rightclick', get_string('enable_rightclick','filter_geogebra'), get_string('enable_rightclick_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_labeldrags', get_string('enable_labeldrags','filter_geogebra'), get_string('enable_labeldrags_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_reseticon', get_string('show_reseticon','filter_geogebra'), get_string('show_reseticon_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_framepossible', get_string('framepossible','filter_geogebra'), get_string('framepossible_help','filter_geogebra'), 'false', 'true', 'false'));

	//User Interface
	$settings->add(new admin_setting_heading('filter_geogebra_interface', get_string('interfaceheading', 'filter_geogebra'), get_string('interfaceheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_menubar', get_string('show_menubar','filter_geogebra'), get_string('show_menubar_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_toolbar', get_string('show_toolbar','filter_geogebra'), get_string('show_toolbar_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_toolbarhelp', get_string('show_toolbarhelp','filter_geogebra'), get_string('show_toolbarhelp_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_algebrainput', get_string('show_algebrainput','filter_geogebra'), get_string('show_algebrainput_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_animationbutton', get_string('show_animationbutton','filter_geogebra'), get_string('show_animationbutton_help','filter_geogebra'), 'false', 'true', 'false'));


	//Language specific Options
	$settings->add(new admin_setting_heading('filter_geogebra_language', get_string('languageheading', 'filter_geogebra'), get_string('languageheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configtext('filter_geogebra_iso_language', get_string('iso_language','filter_geogebra'), get_string('iso_language_help','filter_geogebra'), "", PARAM_RAW, 2));
	$settings->add(new admin_setting_configtext('filter_geogebra_iso_country', get_string('iso_country','filter_geogebra'), get_string('iso_country_help','filter_geogebra'), "", PARAM_RAW, 5));

	//Miscellaneous Options
	//TODO: Embed Options (object vs. applet, id and class)
	$settings->add(new admin_setting_heading('filter_geogebra_miscellaneous', get_string('miscellaneousheading', 'filter_geogebra'), get_string('miscellaneousheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_error_dialogs', get_string('error_dialogs','filter_geogebra'), get_string('error_dialogs_help','filter_geogebra'), 'true', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_use_browserforjs', get_string('use_browserforjs','filter_geogebra'), get_string('use_browserforjs_help','filter_geogebra'), 'true', 'true', 'false'));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_allow_rescaling', get_string('allow_rescaling','filter_geogebra'), get_string('allow_rescaling_help','filter_geogebra'), 'false', 'true', 'false'));
	$settings->add(new admin_setting_configtext('filter_geogebra_on_initparam', get_string('on_initparam','filter_geogebra'), get_string('on_initparam_help','filter_geogebra'), ""));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_show_button', get_string('show_button','filter_geogebra'), get_string('show_button_help','filter_geogebra'), 'false', 'true', 'false'));


	//HTML specific options
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_use_objecttag', get_string('use_objecttag','filter_geogebra'), get_string('use_objecttag_help','filter_geogebra'), false, true, false));
	$settings->add(new admin_setting_configtext('filter_geogebra_id', get_string('embed_id','filter_geogebra'), get_string('embed_id_help','filter_geogebra'), "ggbApplet"));
	$settings->add(new admin_setting_configtext('filter_geogebra_class', get_string('embed_class','filter_geogebra'), get_string('embed_class_help','filter_geogebra'), "", PARAM_RAW, 50));

	//Java VM Options
	$settings->add(new admin_setting_heading('filter_geogebra_javavm', get_string('javavmheading', 'filter_geogebra'), get_string('javavmheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configtext('filter_geogebra_javavm_params', get_string('javavm_params','filter_geogebra'), get_string('javavm_params_help','filter_geogebra'), "-Xmx512m -Djnlp.packEnabled=true", PARAM_RAW, 50));

}

?>