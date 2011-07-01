<?php
/*
 * GeoGebra Moodle filter
 * Copyright (C) 2009 Sara Arjona, Florian Sonner
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

$string['geogebra_settings'] = 'GeoGebra settings';
$string['geogebra_settings_desc'] = 'These settings affect ALL Moodle courses and pages. Changing these settings may change the appearance or functionality of some or all of the GeoGebra files. The default width and height (set below) are always used when GeoGebra files are uploaded as attachments.
<br>
<br>
See filter documentation on how to change the width and height in individual resources and activities using this format in the link URL itself (not in the editing field after the linked text):
<br>
<br>
.../myFileName.ggb?w=#&h=#, for example:
<ul>
<li> .../myFileName.ggb?w=1000 (height is default)</li>
<li> .../myFileName.ggb?h=200 (width is default)</li>
<li> .../myFileName.ggb?w=200&h=800</li>
</ul>';

$string['filtername'] = 'GeoGebra Filter';


$string['enableheading'] = 'Enable Filter';
$string['enableheading_help'] = 'Select for which Links the filter should be enabled.';
$string['sitegeogebratube'] = 'Links to GeoGebraTube';
$string['sitegeogebratube_help'] = 'GeoGebraTube, the new material manager for GeoGebra';
$string['ggbfile'] = 'Links to GeoGebra Files';
$string['ggbfile_help'] = 'GeoGebra Files with the extension .ggb';
$string['ggtfile'] = 'Links to GeoGebra Tool Files';
$string['ggtfile_help'] = 'GeoGebra Tool Files with the extension .ggt';
$string['ggbfile'] = 'Links to GeoGebra Files';
$string['ggbfile'] = 'Links to GeoGebra Files';

$string['dimensionsheading'] = 'Dimensions';
$string['dimensionsheading_help'] = 'The default dimensions for the applet here. The Dimensions can also be configured in the context of a course (context of a ressource or activity doesn\'t work yet - but soon)';
$string['width'] = 'Width';
$string['height'] = 'Height';
$string['width_help'] = 'Default width of applets in px';
$string['height_help'] = 'Default height of applets in px';

$string['setting_on'] = 'On';
$string['setting_off'] = 'Off';
$string['setting_default'] = 

$string['jarheading'] = 'GeoGebra jar-file';
$string['jarheading_help'] = 'Set the URL to the geogebra.jar. Do not change unless you know what you\'re doing';
$string['urljar'] = 'URL to geogebra.jar';
//TODO: Better help text after making urljar a dropbox
$string['urljar_help'] = 'You can either enter a custom url in this field or click on one of the links below to automatically enter an URL (recommended):';

$string['functionalityheading'] = 'Functionality';
$string['functionalityheading_help'] = 'Functionality settings. Those can also be configured in the context of a course (context of a ressource or activity doesn\'t work yet - but soon)';
$string['enable_rightclick'] = 'Enable right click features';
$string['enable_rightclick_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['enable_labeldrags'] = 'Enable drag of Labels';
$string['enable_labeldrags_help'] = 'states whether labels can be dragged. Default: true';
$string['show_reseticon'] = 'Enable reset icon';
$string['show_reseticon_help'] = 'states whether a small icon (GeoGebra ellipse) should be shown in the upper right corner of the applet. Clicking on this icon resets the applet (i.e. it reloads the file given in the filename parameter). Default: true';
$string['framepossible'] = 'Enable "Double click opens application window"';
$string['framepossible_help'] = 'states if a double click on the drawing pad should open the GeoGebra application frame. This parameter is ignored if the type was set to "button". Default: true';

$string['interfaceheading'] = 'User interface';
$string['interfaceheading_help'] = 'User interface settings. Those can also be configured in the context of a course (context of a ressource or activity doesn\'t work yet - but soon)';
$string['show_menubar'] = 'Show Menubar';
$string['show_menubar_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_toolbar'] = 'Show Toolbar';
$string['show_toolbar_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_toolbarhelp'] = 'Show Toolbar Help';
$string['show_toolbarhelp_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_algebrainput'] = 'Show inputbar';
$string['show_algebrainput_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_animationbutton'] = 'Show animation button';
$string['show_animationbutton_help'] = 'Show animation button - only GeoGebra 4 and newer, Default: true';

$string['languageheading'] = 'Language';
$string['languageheading_help'] = 'Language specific options';
$string['iso_language'] = 'Two-letter ISO  language code';
$string['iso_language_help'] = 'GeoGebra tries to set your local language 
	automatically (if it is available among the supported languages, 
	of course). The default language for unsupported languages is English. If you want 
	to specify a certain language manually, please use this parameter. (en ... English, 
	fr ... French, it ... Italian, de ... German, es ... Spanish, sl ... Slovenian, 
	..., zh ... Chinese), Refer to ISO 639-1 for more language codes';
$string['iso_country'] = 'ISO country string';
$string['iso_country_help'] = 'This parameter only makes sense if you use it together with the language parameter. (AT ... Austria) Refer to ISO 3166 for more language codes';

$string['miscellaneousheading'] = 'Miscellaneous';
$string['miscellaneousheading_help'] = 'Miscellaneous options';
$string['error_dialogs'] = 'Display error dialogs';
$string['error_dialogs_help'] = 'States whether error dialogs will be shown if an invalid input is entered (using the Input Bar or JavaScript) Default: true';
$string['use_browserforjs'] = 'Use Browser for JS';
$string['use_browserforjs_help'] = 'Use the Browser for JS - only GeoGebra 4 and newer. Default: false';
$string['allow_rescaling'] = 'Allow the applet to rescale the Graphics View';
$string['allow_rescaling_help'] = 'Determines whether the applet will attempt to rescale the Graphics View when the applet is loaded or the size is changed (eg Zooming in the browser). Disabled if the Spreadsheet or Algebra View are showing. Default: false';
$string['on_initparam'] = 'Argument passed to the JavaScript function ggbOnInit()';
$string['on_initparam_help'] = 'This parameter allows you to specify the argument passed to the JavaScript function ggbOnInit(), which is called once the applet is fully initialised. This is useful when you have multiple applets on a page - see http://www.geogebra.org/source/program/applet/geogebra_applet_java2java.htm
(will have no effect in earlier versions)';
$string['use_objecttag'] = 'Use object tag instead of applet tag to embed the applet';
$string['use_objecttag_help'] = 'Maybe useful, if you use a DTD where the applet tag is deprecated or doesn\'t exist anymore - no support yet.';
$string['embed_id'] = 'HTML id';
$string['embed_id_help'] = 'The HTML id for the applet or object. By default the name attribute is used with the applet tag';
$string['embed_class'] = 'HTML class';
$string['embed_class_help'] = 'The HTML class for the applet or object. None is default, you can specify more than one seperated by a blank.';


$string['javavmheading'] = 'Java VM arguments';
$string['javavmheading_help'] = 'Java VM arguments - be careful';
$string['javavm_params'] = 'Java VM parameter';
//TODO: What is the default here?
$string['javavm_params_help'] = 'This parameter allows you to specify more memory (in megabytes) for the 
	GeoGebra applet Works only in Java 6 update 10 or later 
	(will have no effect in earlier versions), eg. -Xmx256m, Default: -Xmx512m -Djnlp.packEnabled=true';


$string['geogebra_use'] = 'Use';
$string['geogebra_local'] = 'from this webserver';
$string['geogebra_external'] = 'from GeoGebra.org';
$string['geogebra_latest'] = 'latest release from GeoGebra.org';

//TODO: provide Upgrade script for the old Parameters... (or advise admins that they have to use the new ones)
