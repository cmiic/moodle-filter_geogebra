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




$string['geogebra_use'] = 'Use';
$string['geogebra_local'] = 'from this webserver';
$string['geogebra_external'] = 'from GeoGebra.org';
$string['geogebra_latest'] = 'latest release from GeoGebra.org';

//TODO: provide Upgrade script for the old Parameters...
