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

$string['filtername'] = 'GeoGebra Filter';

$string['enableheading'] = 'Filter aktivieren';
$string['enableheading_help'] = 'Hier können Sie einstellen für welche Dateien der Filter aktiv ist.';
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
$string['functionalityheading_help'] = 'Einstellungen zur Funktionalität. Diese können auch im Kontext eines Kurses, Ressourcen und Aktivitäten eingestellt werden.';
$string['enable_rightclick'] = 'Rechtsklick aktivieren';
$string['enable_rightclick_help'] = 'gibt an ob Rechtsklicks im Applet aktiviert sind. Wenn dieser Parameter auf "Nein" gesetzt wird werden Kontext Menüs, Eigenschafts Dialoge und Zoomen mit Hilfe eines Rechtsklicks deaktiviert. Es werden auch einige Tastaturbefehle, wie Entfernen und Strg-R (Alle Objekte neu berechnen), deaktiviert.';
$string['enable_labeldrags'] = 'Ziehen von Beschriftungen aktivieren';
$string['enable_labeldrags_help'] = 'Aktivieren um die Veränderung der Position der Beschriftungen von Objekten und Punkten zuzulassen.';
$string['show_reseticon'] = 'Symbol zum zurücksetzen der Konstruktion anzeigen';
$string['show_reseticon_help'] = 'Durch diese Einstellung wird ein Reset Symbol in der rechten oberen Ecke des Arbeitsblattes platziert, mit dem die Konstruktion in ihren ursprünglichen Zustand zurücksetzen können.';
$string['framepossible'] = 'Doppelklick öffnet Anwendungsfenster"';
$string['framepossible_help'] = 'Ist diese Einstellung aktiviert, kann durch einen Doppelklick im interaktiven Applet ein eigenes GeoGebra Fenster geöffnet werden.';

$string['interfaceheading'] = 'Benutzeroberfläche';
$string['interfaceheading_help'] = 'Einstellungen der Benutzeroberfläche. Diese können auch im Kontext eines Kurses, Ressourcen und Aktivitäten eingestellt werden.';
$string['show_menubar'] = 'Menüleiste anzeigen';
$string['show_menubar_help'] = 'legt fest ob die Menüleiste von GeoGebra im Applet angezeigt wird.';
$string['show_toolbar'] = 'Werkzeugleiste anzeigen';
$string['show_toolbar_help'] = 'legt fest ob die Werkzeugleiste angezeigt wird.';
$string['show_toolbarhelp'] = 'Hilfe für die Werkzeugliste anzeigen';
$string['show_toolbarhelp_help'] = 'legt fest ob der Hilfetext zu den Werkzeugen rechts von der Werkzeugleiste angezeigt wird.';
$string['show_algebrainput'] = 'Eingabeleiste anzeigen';
$string['show_algebrainput_help'] = 'legt fest ob die Eingabezeile im Applet angezeigt wird.';
$string['show_animationbutton'] = 'Show animation button';
$string['show_animationbutton_help'] = 'Show animation button - only GeoGebra 4 and newer.';

$string['languageheading'] = 'Sprache';
$string['languageheading_help'] = 'Spracheinstellungen - normalerweise nicht benötigt';
$string['iso_language'] = 'ISO  Sprachcode';
$string['iso_language_help'] = 'GeoGebra versucht Ihre Sprache automatisch zu erkennen 
	(falls sich diese unter den unterstützen Sprachen befindet). 
	Die Standardsprache für nicht unterstützte Sprachen ist Englisch. 
	Falls Sie eine bestimmte Spache manuell einstellen möchten, verwenden Sie diesen Parameter. (en ... Englisch, 
	fr ... Französisch, it ... Italienisch, de ... Deutsch, es ... Spanisch, sl ... Slowenisch, 
	..., zh ... Chinesisch), Konsultieren sie ISO 639-1 für weitere Sprachcodes';
$string['iso_country'] = 'ISO Ländercode';
$string['iso_country_help'] = 'Dieser Parameter hat nur zusammen mit dem Sprachcode eine Bedeutung. (AT ... Österreich) Konsultieren sie ISO 3166 für weitere Ländercodes';

$string['miscellaneousheading'] = 'Diverses';
$string['miscellaneousheading_help'] = 'Diverse Optionen';
$string['error_dialogs'] = 'Fehlerdialogfenster anzeigen';
$string['error_dialogs_help'] = 'Gibt an ob Fehler Dialoge angezeigt werden wenn eine nicht valide Eingabe erfolgt (in der Eingabezeile oder JavaScript)';
$string['use_browserforjs'] = 'Javasccript im Broser ausführen';
$string['use_browserforjs_help'] = 'Das JavaScript wird im Browser ausgeführt - nur GeoGebra 4 und neuer. Damit dies funktioniert, müssen Sie sicherstellen, dass das Javascript im HTML eingebetet ist (mit dem Filter derzeit nicht möglich)';
$string['allow_rescaling'] = 'Dem Applet erlauben den Grafikanzeige zu skalieren';
$string['allow_rescaling_help'] = 'Mit dieser Einstellung legen Sie fest ob das Applet versucht die Grafikansicht neu zu skalieren, wenn die Größe, beispielsweise durch Zoomen im Browser, verändert wird. Deaktiviert wenn Tabellen- oder Algebraansicht aktiviert sind';
$string['on_initparam'] = 'Argument, das an die JavaScript Function ggbOnInit() übergeben wird';
$string['on_initparam_help'] = 'Hier können Sie festlegen welches Argument der Javascript Funktion ggbOnInit() übergeben wird. Diese Funktion wird aufgerufen sobald das Applet fertig geladen hat. 
Nützlich wenn Sie mehr als ein Applet auf der Seite anzeigen, siehe auch: http://www.geogebra.org/source/program/applet/geogebra_applet_java2java.htm';
$string['show_button'] = 'Schaltfläche zum Öffnen der Anwendung anzeigen';
$string['show_button_help'] = 'Wenn diese Einstellung aktiv ist wird NUR eine Schaltfläche angezeigt um GeoGebra in einem eigenen Anwenungsfenster zu öffnen (alle anderen Parameter, werden nicht mehr berücksichtigt).';
$string['use_objecttag'] = 'Verwende object Tag statt dem applet Tag zum Einbetten des Applets';
$string['use_objecttag_help'] = 'Möglicherweise nützlich wenn eine DTD verwendet wird in der das applet tag nicht mehr verwendet werden soll oder nicht mehr unterstützt wird.';
$string['embed_id'] = 'HTML id';
$string['embed_id_help'] = 'Die HTML id für das Applet bzw. Object. Standardmäßig wird ein name Attribut im Applet Tag benutzt';
$string['embed_class'] = 'HTML class';
$string['embed_class_help'] = 'Die HTML Klasse für das Applet oder Object. Standardmäßig wird keine verwendet, Sie können aber auch mehrere verwenden die durch ein Leerzeichen getrennt werden.';


$string['javavmheading'] = 'Java VM Argumente';
$string['javavmheading_help'] = 'Java VM Argumente';
$string['javavm_params'] = 'Java VM Parameter';
$string['javavm_params_help'] = 'Mit diesem Parameter können sie mehr Speicher oder andere Einstellungen als Argumente an die Java VM übergeben. 
	Funktioniert nur mit Java 6 update 10 oder neuer
	(hat keine Auswirkungen in älteren Versionen), z.B.: -Xmx256m';


$string['defaultforsite'] = 'Standard für diese Moodleinstallation';

$string['geogebra_use'] = 'Benutze';
$string['geogebra_local'] = '4.0 von diesem Webserver';
$string['geogebra_local32'] = '3.2 von diesem Webserver';

$string['geogebra_external'] = 'von GeoGebra.org';
$string['geogebra_latest'] = 'aktuelle Release von GeoGebra.org';
$string['geogebra_external32'] = '3.2 Release von GeoGebra.org';
$string['geogebra_external40'] = '4.0 Release von GeoGebra.org';
$string['geogebra_external42'] = '4.2 Beta von GeoGebra.org (nicht empfohlen, nur zum testen)';

