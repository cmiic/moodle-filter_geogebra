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
 * GeoGebra filter ggb params
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



//http://www.geogebra.org/en/wiki/index.php/GeoGebra_Applet_Parameters

function filter_geogebra_get_params() {
	$ggbparams = array(
			'framePossible' => 'filter_geogebra_framepossible',
			'showResetIcon' => 'filter_geogebra_show_reseticon',
			'showAnimationButton' => 'filter_geogebra_show_animationbutton',
			'enableRightClick' => 'filter_geogebra_enable_rightclick',
			'errorDialogsActive' => 'filter_geogebra_error_dialogs',
			'enableLabelDrags' => 'filter_geogebra_enable_labeldrags',
			'showMenuBar' => 'filter_geogebra_show_menubar',
			'showToolBar' => 'filter_geogebra_show_toolbar',
			'showToolBarHelp' => 'filter_geogebra_show_toolbarhelp',
			'showAlgebraInput' => 'filter_geogebra_show_algebrainput',
			'useBrowserForJS' => 'filter_geogebra_use_browserforjs',
			'allowRescaling' => 'filter_geogebra_allow_rescaling',
			'type' => 'filter_geogebra_show_button',
			'language' => 'filter_geogebra_iso_language',
			'country' => 'filter_geogebra_iso_country',
			'ggbOnInitParam' => 'filter_geogebra_on_initparam',
			'java_arguments' => 'filter_geogebra_javavm_params'
	);
	return $ggbparams;	
}
