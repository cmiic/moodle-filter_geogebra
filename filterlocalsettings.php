<?php
class geogebra_filter_local_settings_form extends filter_local_settings_form {
	protected function definition_inner($mform) {
        global $CFG;
		
        $stroff = get_string('off', 'filters');
	    $stron = get_string('on', 'filters');
	    $strdefaultoff = get_string('defaultx', 'filters', $stroff);
	    $strdefaulton = get_string('defaultx', 'filters', $stron);
	    $activechoices = array(
	        TEXTFILTER_INHERIT => '',
	        TEXTFILTER_OFF => $stroff,
	        TEXTFILTER_ON => $stron,
	    );
	    echo $stroff;
	    echo $stron;
	    echo TEXTFILTER_INHERIT;
	    echo TEXTFILTER_OFF;
	    echo TEXTFILTER_ON;
	    print_r($this->context);
	    print_r(filter_get_local_config('filter/geogebra',$this->context->id));
	    print_r(get_context_instance(CONTEXT_SYSTEM));
	    print_r(filter_get_local_config('filter/geogebra',3));
//		if ($filterinfo->inheritedstate == TEXTFILTER_ON) {
//            $activechoices[TEXTFILTER_INHERIT] = $strdefaulton;
//        } else {
//            $activechoices[TEXTFILTER_INHERIT] = $strdefaultoff;
//        }
	    $mform->addElement('header', 'filter_geogebra_dimensions', get_string('dimensionsheading', 'filter_geogebra'));
    	$mform->addElement('text', 'filter_geogebra_width', get_string('width', 'filter_geogebra'), array('size' => 20));
        $mform->setType('filter_geogebra_width', PARAM_INT);
        $mform->addElement('text', 'filter_geogebra_height', get_string('height', 'filter_geogebra'), array('size' => 20));
        $mform->setType('filter_geogebra_height', PARAM_INT);
        $mform->closeHeaderBefore('filter_geogebra_functionality');
        echo $CFG->filter_geogebra_enable_rightclick;
        $mform->addElement('header', 'filter_geogebra_functionality', get_string('functionalityheading', 'filter_geogebra'));
        $select = &$mform->addElement('select', 'filter_geogebra_enable_rightclick', get_string('enable_rightclick','filter_geogebra'), array('true'=>'Default', 'true'=>'On', 'false'=>'Off'));
       	$select->setSelected('Default');
        //$mform->addElement('checkbox', 'filter_geogebra_enable_rightclick', get_string('enable_rightclick','filter_geogebra'));
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

