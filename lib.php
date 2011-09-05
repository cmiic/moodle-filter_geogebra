<?php
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
