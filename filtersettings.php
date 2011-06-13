<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *  Mediaplugin filter settings
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
	
	$settings->add(new admin_setting_heading('filter_geogebra_enable', get_string('enableheading', 'filter_geogebra'), get_string('enableheading_help', 'filter_geogebra')));
	//By default we will enable the filter for ggb, ggt and geogebratube
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_geogebratube', get_string('sitegeogebratube','filter_geogebra'), get_string('sitegeogebratube_help','filter_geogebra'), 1));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_ggb', get_string('ggbfile','filter_geogebra'), get_string('ggbfile_help','filter_geogebra'), 1));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_ggt', get_string('ggtfile','filter_geogebra'), get_string('ggtfile_help','filter_geogebra'), 1));
	//TODO: should we parse html too? not by default because I think it would be a performance problem - but we would have to try it out
	
	$settings->add(new admin_setting_heading('filter_geogebra_dimensions', get_string('dimensionsheading', 'filter_geogebra'), get_string('dimensionsheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configtext('filter_geogebra_defaultwidth', get_string('width','filter_geogebra'), get_string('width_help','filter_geogebra'), "400"));
	$settings->add(new admin_setting_configtext('filter_geogebra_defaultheight', get_string('height','filter_geogebra'), get_string('height_help','filter_geogebra'), "400"));
	
	
	$settings->add(new admin_setting_heading('filter_geogebra_jar', get_string('jarheading', 'filter_geogebra'), get_string('jarheading_help', 'filter_geogebra')));
	//TODO: make urljar this a dropbox
	$settings->add(new admin_setting_configtext('filter_geogebra_urljar', get_string('urljar','filter_geogebra'), get_string('urljar_help','filter_geogebra'), "http://www.geogebra.org/webstart/3.2/geogebra.jar"));
	
	//Functionality
	$settings->add(new admin_setting_heading('filter_geogebra_functionality', get_string('functionalityheading', 'filter_geogebra'), get_string('functionalityheading_help', 'filter_geogebra')));
	$settings->add(new admin_setting_configcheckbox('filter_geogebra_enable_rightclick', get_string('enable_rightclick','filter_geogebra'), get_string('enable_rightclick_help','filter_geogebra'), 1));
	
	
}

?>