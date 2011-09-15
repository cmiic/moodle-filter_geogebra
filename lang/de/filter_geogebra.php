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
 * GeoGebra filter german language strings
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Sara Arjona, Florian Sonner, Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['enableheading'] = 'Filter aktivieren';
$string['enableheading_help'] = 'Hier können sie einstellen für welche Dateien der Filter aktiv ist.';
$string['sitegeogebratube'] = 'Links zu GeoGebraTube';
$string['sitegeogebratube_help'] = 'GeoGebraTube, der neue Material Manager für GeoGebra';
$string['ggbfile'] = 'Links zu GeoGebra Dateien';
$string['ggbfile_help'] = 'GeoGebra Dateien mit der Erweiterung .ggb';
$string['ggtfile'] = 'Links zu GeoGebra Tool Dateien';
$string['ggtfile_help'] = 'GeoGebra Werkzeug Dateien mit der Erweiterung .ggt';

$string['dimensionsheading'] = 'Abmessungen';
$string['dimensionsheading_help'] = 'Standard Abmessungen für das Applet.';
$string['localdimensheading'] = 'Abmessungen';
$string['localdimensheading_help'] = 'Breite und Höhe des Applets in px, leer lassen um die Standardeinstellungen für dieses Moodle zu verwenden.';
$string['width'] = 'Breite';
$string['height'] = 'Höhe';


$string['width_help'] = 'Standard Breite des Applets in px';
$string['height_help'] = 'Standard Höhe des Applets in px';

$string['jarheading'] = 'GeoGebra jar-Datei';
$string['jarheading_help'] = 'Wählen sie hier die URL zur geogebra.jar.';
$string['urljar'] = 'URL zu geogebra.jar';
$string['urljar_help'] = 'Wählen sie hier welche jars verwendet werden sollen, aktuelle Release von GeoGebra.org ist empfohlen, auf einer sicheren Verbindung (https) könnten aber die jars von ihrem eigenen Webserver (Moodle) hilfreich sein.';

$string['functionalityheading'] = 'Funktionalität';
$string['functionalityheading_help'] = 'Einstellungen zur Funktionalität. Diese können auch im Kontext eines Kurse (der Kontext von manchen Ressourcen und Aktivitäten funktioniert noch nicht - ein Moodle Bug der hoffentlich bald behoben wird)';
$string['enable_rightclick'] = 'Rechtsklick aktivieren';
$string['enable_rightclick_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['enable_labeldrags'] = 'Ziehen von Beschriftungen aktivieren';
$string['enable_labeldrags_help'] = 'states whether labels can be dragged. Default: true';
$string['show_reseticon'] = 'Symbol zum zurücksetzen der Konstruktion anzeigen';
$string['show_reseticon_help'] = 'states whether a small icon (GeoGebra ellipse) should be shown in the upper right corner of the applet. Clicking on this icon resets the applet (i.e. it reloads the file given in the filename parameter). Default: true';
$string['framepossible'] = 'Doppelklick öffnet Anwendungsfenster"';
$string['framepossible_help'] = 'states if a double click on the drawing pad should open the GeoGebra application frame. This parameter is ignored if the type was set to "button". Default: true';

$string['interfaceheading'] = 'Benutzeroberfläche';
$string['interfaceheading_help'] = 'User interface settings. Those can also be configured in the context of a course (context of a ressource or activity doesn\'t work yet - but soon)';
$string['show_menubar'] = 'Menüleiste anzeigen';
$string['show_menubar_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_toolbar'] = 'Werkzeugleiste anzeigen';
$string['show_toolbar_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_toolbarhelp'] = 'Hilfe für die Werkzeugliste anzeigen';
$string['show_toolbarhelp_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_algebrainput'] = 'Eingabeleiste anzeigen';
$string['show_algebrainput_help'] = 'states whether right clicks should be handled by the applet. Setting this parameter to "false" disables context menus, properties dialogs and right-click-zooming. NB also enables/disables some keyboard shortcuts eg Delete and Ctrl-R (recompute all objects). Default: true ';
$string['show_animationbutton'] = 'Show animation button';
$string['show_animationbutton_help'] = 'Show animation button - only GeoGebra 4 and newer, Default: true';

$string['languageheading'] = 'Sprache';
$string['languageheading_help'] = 'Spracheinstellungen - normalerweise nicht benötigt';
$string['iso_language'] = 'ISO  Sprachcode';
$string['iso_language_help'] = 'GeoGebra tries to set your local language
	automatically (if it is available among the supported languages, 
	of course). The default language for unsupported languages is English. If you want 
	to specify a certain language manually, please use this parameter. (en ... English, 
	fr ... French, it ... Italian, de ... German, es ... Spanish, sl ... Slovenian, 
	..., zh ... Chinese), Refer to ISO 639-1 for more language codes';
$string['iso_country'] = 'ISO Ländercode';
$string['iso_country_help'] = 'This parameter only makes sense if you use it together with the language parameter. (AT ... Austria) Refer to ISO 3166 for more language codes';

$string['miscellaneousheading'] = 'Diverse';
$string['miscellaneousheading_help'] = 'Diverse Optionen';
$string['error_dialogs'] = 'Fehlerdialogfenster anzeigen';
$string['error_dialogs_help'] = 'States whether error dialogs will be shown if an invalid input is entered (using the Input Bar or JavaScript) Default: true';
$string['use_browserforjs'] = 'Javasccript im Broser ausführen';
$string['use_browserforjs_help'] = 'Use the Browser for JS - only GeoGebra 4 and newer. Default: false';
$string['allow_rescaling'] = 'Dem Applet erlauben den Grafikanzeige zu skalieren';
$string['allow_rescaling_help'] = 'Determines whether the applet will attempt to rescale the Graphics View when the applet is loaded or the size is changed (eg Zooming in the browser). Disabled if the Spreadsheet or Algebra View are showing. Default: false';
$string['on_initparam'] = 'Argument, das an die JavaScript Function ggbOnInit() übergeben wird';
$string['on_initparam_help'] = 'This parameter allows you to specify the argument passed to the JavaScript function ggbOnInit(), which is called once the applet is fully initialised. This is useful when you have multiple applets on a page - see http://www.geogebra.org/source/program/applet/geogebra_applet_java2java.htm
(will have no effect in earlier versions)';
$string['show_button'] = 'Schaltfläche zum Öffnen der Anwendung anzeigen';
$string['show_button_help'] = 'If you use this parameter the applet will ONLY show a button to open the GeoGebra application frame (all other options are useless then)';
$string['use_objecttag'] = 'Verwende object tag statt dem applet tag zum einbetten des Applets';
$string['use_objecttag_help'] = 'Maybe useful, if you use a DTD where the applet tag is deprecated or doesn\'t exist anymore - no support yet.';
$string['embed_id'] = 'HTML id';
$string['embed_id_help'] = 'The HTML id for the applet or object. By default the name attribute is used with the applet tag';
$string['embed_class'] = 'HTML class';
$string['embed_class_help'] = 'The HTML class for the applet or object. None is default, you can specify more than one seperated by a blank.';


$string['javavmheading'] = 'Java VM Argumente';
$string['javavmheading_help'] = 'Java VM arguments - be careful';
$string['javavm_params'] = 'Java VM Parameter';
$string['javavm_params_help'] = 'This parameter allows you to specify more memory (in megabytes) for the
	GeoGebra applet Works only in Java 6 update 10 or later 
	(will have no effect in earlier versions), eg. -Xmx256m, Default: -Xmx512m -Djnlp.packEnabled=true';


$string['defaultforsite'] = 'Standard für diese Moodleinstallation';

$string['geogebra_use'] = 'Benutze';
$string['geogebra_local'] = 'von diesem Webserver';
$string['geogebra_external'] = 'von GeoGebra.org';
$string['geogebra_latest'] = 'aktuelle Release von GeoGebra.org';
$string['geogebra_external32'] = '3.2 Release von GeoGebra.org';


