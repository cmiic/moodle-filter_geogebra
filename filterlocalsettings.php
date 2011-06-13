<?php
class filter_geogebra_local_settings_form extends filter_local_settings_form {
    protected function definition_inner($mform) {
        $mform->addElement('text', 'filter_geogebra_defaultwidth', get_string('width', 'filter_geogebra'), array('size' => 20));
        $mform->setType('width', PARAM_NOTAGS);
        $mform->addElement('text', 'filter_geogebra_defaultheight', get_string('height', 'filter_geogebra'), array('size' => 20));
        $mform->setType('height', PARAM_NOTAGS);
    }
}
?>