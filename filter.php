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
//TODO
/**
 * @author Sara Arjona, Florian Sonner, Christoph Reinisch
 * @version $Id: filter.php, v2.0 2009/06/05 $
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
	//TODO: Do I need this?
	//private $attribs, $params;
	
	function filter($text, array $options = array()) {
		global $CFG;

		
		//TODO remove when finished - we don't use this anymore
		// construct applet parameters from config
//		$params_html = '';
//		$params = explode("\n", $CFG->filter_geogebra_params);
		
		if (!is_string($text) or empty($text)) {
            // non string data can not be filtered anyway
            return $text;
        }
        if (stripos($text, '</a>') === false) {
            // performance shortcut - all regexes bellow end with the </a> tag,
            // if not present nothing can match
            return $text;
        }
		
        $newtext = $text; // we need to return the original value if regex fails!
		
        //TODO: Add geogebratube regex to the filter
//      http://www.geogebratube.org/student/23
//		http://www.geogebratube.org/files/material-23.ggb
//		http://www.geogebratube.org/material/show/id/23
        
        if (!empty($CFG->filter_geogebra_enable_ggb)) {
	       	$search = '/<a\s[^>]*href="([^"#\?]+\.ggb([#\?][^"]*)?)"[^>]*>([^>]*)<\/a>/is';
        //$search = '/<a(?:.*?)href=\"(.*?)\.ggb(?:\?(?:w=([0-9]+))?(?:&)?(?:h=([0-9]+))?)?\"(?:[^>]*)>(.*?)<\/a>/is';
        	$newtext = preg_replace_callback($search, array( &$this,'filter_geogebra_callback'), $newtext); 
        }
	    if (!empty($CFG->filter_geogebra_enable_ggt)) {
        	$search = '/<a\s[^>]*href="([^"#\?]+\.ggt([#\?][^"]*)?)"[^>]*>([^>]*)<\/a>/is';
//        $search = '/<a(?:.*?)href=\"(.*?)\.ggb(?:\?(?:w=([0-9]+))?(?:&)?(?:h=([0-9]+))?)?\"(?:[^>]*)>(.*?)<\/a>/is';
        	$newtext = preg_replace_callback($search, array( &$this,'filter_geogebra_callback'), $newtext); 
        }
///===========================
/// old stuff, TODO:delete when finished
//		foreach($params as $param)
//		{		
//			if(strpos($param, '=') !== false) {
//				$values = explode('=', $param);
//				$params_html .= '<param name="'.$values[0].'" value="'.str_replace("\n", '', $values[1]).'" />';
//			}
//		}

		// yep, complex regex!
		// note: "?:" is a trick to hide a match from the results
		// TODO just get everything beyond the ? in the url as a match and explode it in the callback
//		return preg_replace_callback(
//			'/<a(?:.*?)href=\"(.*?)\.ggb(?:\?(?:w=([0-9]+))?(?:&)?(?:h=([0-9]+))?)?\"(?:[^>]*)>(.*?)<\/a>/is',
//			'geogebra_linker',
//			$text
//		);
		return $newtext;
	}

	/**
	 * Parse list of alternative URLs
	 * @param string $url urls separated with '#', size specified as ?d=640x480 or #d=640x480 or ?w=200&h=800
	 * @return array (urls, width, height)
	 */
	function filter_geogebra_parse_alternatives($url, $defaultwidth = 0, $defaultheight = 0) {
	    $urls = explode('#', $url);
	    $width  = $defaultwidth;
	    $height = $defaultheight;
	    $returnurls = array();
	
	    foreach ($urls as $url) {
	        $matches = null;
	
	        if (preg_match('/^d=([\d]{1,4})x([\d]{1,4})$/i', $url, $matches)) { // #d=640x480
	            $width  = $matches[1];
	            $height = $matches[2];
	            continue;
	        }
	        if (preg_match('/\?d=([\d]{1,4})x([\d]{1,4})$/i', $url, $matches)) { // old style file.ext?d=640x480
	            $width  = $matches[1];
	            $height = $matches[2];
	            $url = str_replace($matches[0], '', $url);
	        }
			
		    //Catch the old ?w=800&h=600 Syntax
			if (preg_match('/\?(?:w=([0-9]+))?(?:&)?(?:amp;)?(?:h=([0-9]+))?$/i', $url, $matches)) { // old style file.ext?w=640&h=480))
				if (isset($matches[1])) {
					$width  = $matches[1];
				}
				if (isset($matches[2])) {
					$height = $matches[2];
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

///===========================
/// utility functions are now part of the object so we don't have to define global vars

	/** 
	 * The function where the actual applet code is constructed.
	 * 
	 * @author Florian Sonner, Christoph Reinisch
	 */
	function filter_geogebra_callback($link) {
		
		global $CFG;
		list($urls, $width, $height) = filter_geogebra_parse_alternatives($link[1], 0, 0);
		
		if (!$width) {
			if (isset($this->localconfig['filter_geogebra_width'])) {
	    		$width = $this->localconfig['filter_geogebra_width'];
	    	} else {
	        	$width = $CFG->filter_geogebra_width;
	    	}
		}
		if(!$height) {
			if (isset($this->localconfig['filter_geogebra_height'])) {
		    	$height = $this->localconfig['filter_geogebra_height'];
		    } else {
		        $height = $CFG->filter_geogebra_height;
		    }
		}
		//TODO: !!! what to do with more then one URL
		//TODO: !!! All the params
		$return = '<applet codebase="./" height="'.$height.'" width="'.$width.'" '
				. 'archive="'.$CFG->filter_geogebra_urljar.'"'
				. ' code="geogebra.GeoGebraApplet">'
				. '<param value="'.$urls[0].'" name="filename" />'.$params_html.'</applet> ';
		
		return $return;
	}
}
?>

