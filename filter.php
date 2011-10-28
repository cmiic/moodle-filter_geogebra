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
 * GeoGebra filter
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Sara Arjona, Florian Sonner, Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/filelib.php');

/**
 * Automatic GeoGebra filter Class
 *
 * Searches for a link to a .ggb file and replaces this link with an applet.
 *
 * If the link-url also contains parameters like
 * "file.ggb?w=600"
 * "file.gbb?w=600&h=800"
 * "file.gbb?h=400"
 * those dimensions will be applied (w = width, h = height).
 *
 * If just one parameter is given the other dimension will be the default one.
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 onwards Florian Sonner, Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author 	   Florian Sonner, Christoph Reinisch
 */

class filter_geogebra extends moodle_text_filter {

	protected $params_html;
	protected $defaultheight;
	protected $defaultwidth;

	function filter($text, array $options = array()) {

		global $CFG;

		if (!is_string($text) or empty($text)) {
			// non string data can not be filtered anyway
			return $text;
		}
		if (stripos($text, '</a>') === false) {
			// performance shortcut - all regexes bellow end with the </a> tag,
			// if not present nothing can match
			return $text;
		}
		if (stripos($text, 'name="ggbBase64"') != false) {
			// ggbBase64 already embeded - nothing to do...
			return $text;
		}
		if (stripos($text, '<applet ') != false) {
			// There is already an applet on the page
			// we do not want to apply filter if there is already an applet - nothing to do...
			return $text;
		}
		$newtext = $text; // we need to return the original value if regex fails!

		//Get width and height can be overruled by urlparams
		if (isset($this->localconfig['filter_geogebra_width'])) {
			$this->defaultwidth = $this->localconfig['filter_geogebra_width'];
		} else {
			$this->defaultwidth = $CFG->filter_geogebra_width;
		}
		if (isset($this->localconfig['filter_geogebra_height'])) {
			$this->defaultheight = $this->localconfig['filter_geogebra_height'];
		} else {
			$this->defaultheight = $CFG->filter_geogebra_height;
		}

		$this->params_html = filter_geogebra_build_params($this->localconfig);

		//the ^@ is neede because the output with questions breaks otherwise
		//don't know why
		if (!empty($CFG->filter_geogebra_enable_ggb)) {
			$search = '/<a\s[^>]*href="([^"^@]+\.ggb([#\?][^"]*)?)"[^>]*>([^>]*)<\/a>/is';
			$newtext = preg_replace_callback($search, array( &$this, 'filter_geogebra_callback'), $newtext);
		}
		//the ^@ is neede because the output with questions breaks otherwise
		//don't know why
		if (!empty($CFG->filter_geogebra_enable_ggt)) {
			$search = '/<a\s[^>]*href="([^"^@]+\.ggt([#\?][^"]*)?)"[^>]*>([^>]*)<\/a>/is';
			$newtext = preg_replace_callback($search, array( &$this, 'filter_geogebra_callback'), $newtext);
		}

		if (empty($newtext) or $newtext === $text) {
			// error or not filtered
			unset($newtext);
			return $text;
		}

		return $newtext;
	}

	///===========================
	/// callback function now part of the object
	/**
	* The function where the actual applet code is constructed.
	*
	* @author Florian Sonner, Christoph Reinisch
	*/
	function filter_geogebra_callback($link) {

		global $CFG;

		if (filter_geogebra_ignore($link[0])) {
			return $link[0];
		}

		list($urls, $width, $height) = filter_geogebra_parse_alternatives($link[1], $this->defaultwidth, $this->defaultheight);

		//tag defaults to applet
		$tag = 'applet';
		if (isset($this->localconfig['filter_geogebra_use_objecttag'])) {
			if ($this->localconfig['filter_geogebra_use_objecttag'] === 'true') {
				$tag = 'object';
			} else if ($this->localconfig['filter_geogebra_use_objecttag'] === 'false') {
				$tag = 'applet';
			}
		} else if ($CFG->filter_geogebra_use_objecttag){
			$tag = 'object';
		}

		//the name or id of the applet
		$applet_id = 'ggbApplet';
		if (isset($this->localconfig['filter_geogebra_id'])) {
			if ($this->localconfig['filter_geogebra_id'] != "") {
				$applet_id = $this->localconfig['filter_geogebra_id'];
			}
		} else if ($CFG->filter_geogebra_id != ""){
			$applet_id = $CFG->filter_geogebra_id;
		}

		$ret = '<'. $tag;
		if ($tag == 'applet') {
			$ret .= ' name="'.$applet_id.'"';
			$ret .= ' code="geogebra.GeoGebraApplet" ';
			$ret .= ' archive="geogebra.jar"';
			$ret .= ' codebase="'. $CFG->filter_geogebra_urljar .'"';
			$ret .= ' width="'. $width .'"';
			$ret .= ' height="'. $height .'" mayscript="true">';
		} else {
			$ret .= ' type="application/x-java-applet"';
			$ret .= ' id="'.$applet_id.' "';
			$ret .= ' width="'. $width .'" ';
			$ret .= ' height="'. $height .'">';
			$ret .= '<param name="code"  value="geogebra.GeoGebraApplet"/>';
			$ret .= '<param name="archive" value="geogebra.jar"/>';
			$ret .= '<param name="codebase" value="'. $CFG->filter_geogebra_urljar .'"/>';
			$ret .= '<param name="mayscript" value="true"/>';
		}
		$ret .= '<param name="filename"  value="'.$urls[0].'"/>';
		$ret .= $this->params_html;
		$ret .= '</'. $tag . '>';


		return $ret;
	}
}

/**
 * Should the current tag be ignored in this filter?
 * @param string $tag
 * @return bool
 */
function filter_geogebra_ignore($tag) {
	if (preg_match('/class="[^"]*nogeogebrafilter/i', $tag)) {
		return true;
	} else {
		false;
	}
}

/**
 * Parse list of alternative URLs
 * @param string $url urls separated with '#', size specified as
 * ?d=640x480 or #d=640x480 or ?w=200&h=800
 * @return array (urls, width, height)
 */
function filter_geogebra_parse_alternatives($url, $defaultwidth, $defaultheight) {

	$urls = explode('#', $url);
	$width  = $defaultwidth;
	$height = $defaultheight;
	$returnurls = array();

	foreach ($urls as $url) {
		$matches = null;

		if (preg_match('/^d=([\d]{1,4})x([\d]{1,4})$/i', $url, $matches)) {
			// #d=640x480
			$width  = $matches[1];
			$height = $matches[2];
			continue;
		}
		if (preg_match('/\?d=([\d]{1,4})x([\d]{1,4})$/i', $url, $matches)) {
			// old style file.ext?d=640x480
			$width  = $matches[1];
			$height = $matches[2];
			$url = str_replace($matches[0], '', $url);
		}

		//Catch the old ?w=800&h=600 Syntax
		if (preg_match('/\?(?:w=([0-9]+))?(?:&)?(?:amp;)?(?:h=([0-9]+))?$/i', $url, $matches)) {
			// old style file.ext?w=640&h=480))
			if (isset($matches[1])) {
				if ($matches[1] != "") {
					$width  = $matches[1];
				}
			}
			if (isset($matches[2])) {
				if ($matches[2] != "") {
					$height = $matches[2];
				}
			}
			$url = str_replace($matches[0], '', $url);
		}

		$url = str_replace('&amp;', '&', $url);
		$url = clean_param($url, PARAM_URL);
		if (empty($url)) {
			continue;
		}

		$returnurls[] = $url;
	}

	return array($returnurls, $width, $height);
}

function filter_geogebra_build_params($localconfig) {
	global $CFG;

	$params = '';
	if (isset($localconfig['filter_geogebra_show_button'])){
		if ($localconfig['filter_geogebra_show_button'] === 'true') {
			$params .= '<param name="type" value="button" />';
		} else if ($localconfig['filter_geogebra_show_button'] === 'false') {
			$params .= filter_geogebra_get_params_helper($localconfig);
		}
	} else if ($CFG->filter_geogebra_show_button === 'true') {
		$params .= '<param name="type" value="button" />';
	} else {
		$params .= filter_geogebra_get_params_helper($localconfig);
	}

	return $params;
}

function filter_geogebra_get_params_helper($localconfig) {
	global $CFG;

	require_once($CFG->dirroot.'/filter/geogebra/lib.php');

	$ggbparams = filter_geogebra_get_params();

	$params = '';
	foreach ($ggbparams as $paramname => $filter_geogebra_name) {
		if ($CFG->$filter_geogebra_name != "" || isset($localconfig[$filter_geogebra_name])) {
			$params .= '<param name="'.$paramname.'" value="';
			if (isset($localconfig[$filter_geogebra_name])){
				$params .= $localconfig[$filter_geogebra_name];
			} else {
				$params .= $CFG->$filter_geogebra_name;
			}
			$params .= '" />';
		}
	}
	return $params;
}

