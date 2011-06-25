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
        if (stripos($text, 'ggbBase64') != false) {
        	// ggbBase64 already emeded - nothing to do...
        	// TODO: or do we want to include (enforce) the params?
        	return $text;
        }
		if (stripos($text, 'applet') != false) {
        	// There is already an applet on the page 
        	// we do not want to include a second applet - nothing to do...
        	// TODO: or do we want to include (enforce) the params?
        	return $text;
        }
        $newtext = $text; // we need to return the original value if regex fails!
        
//        print_r($this);
//        print_r($CFG); //Never do this!!!
        
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
		
	    //TODO: Add geogebratube regex to the filter
//      http://www.geogebratube.org/student/23
//		http://www.geogebratube.org/files/material-23.ggb
//		http://www.geogebratube.org/material/show/id/23
//        if (!empty($CFG->filter_geogebra_enable_geogebratube)) {
//        	$search = '';
//        	$newtext = preg_replace_callback($search, array( &$this, 'filter_geogebra_callback'), $newtext); 
//        }
	    //TODO: Check weather the file is already embeded!!!
	    
	    
        if (!empty($CFG->filter_geogebra_enable_ggb)) {
	       	$search = '/<a\s[^>]*href="([^"#\?]+\.ggb([#\?][^"]*)?)"[^>]*>([^>]*)<\/a>/is';
        	$newtext = preg_replace_callback($search, array( &$this, 'filter_geogebra_callback'), $newtext); 
        }
	    if (!empty($CFG->filter_geogebra_enable_ggt)) {
        	$search = '/<a\s[^>]*href="([^"#\?]+\.ggt([#\?][^"]*)?)"[^>]*>([^>]*)<\/a>/is';
        	$newtext = preg_replace_callback($search, array( &$this, 'filter_geogebra_callback'), $newtext); 
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

        if (empty($newtext) or $newtext === $text) {
            // error or not filtered
            unset($newtext);
            return $text;
        }
        
		return $newtext;
	}

	///===========================
	/// callback function now part of the object
	//TODO: is dies gescheit?
	
	/** 
	 * The function where the actual applet code is constructed.
	 * 
	 * @author Florian Sonner, Christoph Reinisch
	 */
	function filter_geogebra_callback($link) {
		
		global $CFG;
		
		list($urls, $width, $height) = filter_geogebra_parse_alternatives($link[1], $this->defaultwidth, $this->defaultheight);
		
		
		
		$browser = get_file_browser();
		$context = get_system_context();
		
		$filepath = explode('/', $urls[0]);
		
		print_r($filepath);
		
		$filearea = null;
		$itemid   = null;
		$filename = null;
		if ($fileinfo = $browser->get_file_info($context, $component, $filearea, $itemid, '/', $filename)) {
		    // build a Breadcrumb trail
		    $level = $fileinfo->get_parent();
		    while ($level) {
		        $params = base64_encode(serialize($level->get_params()));
		        $path[] = array('name'=>$level->get_visible_name(), 'path'=>$params);
		        $level = $level->get_parent();
		    }
		    $path = array_reverse($path);
		    $children = $fileinfo->get_children();
		    foreach ($children as $child) {
		        if ($child->is_directory()) {
		            echo $child->get_visible_name();
		            // display contextid, itemid, component, filepath and filename
		            var_dump($child->get_params());
		        }
		    }
		}
		//Get the base64 encoded string
		//We should be OK, because of Moodle cache 
		//TODO: Test weather this is to time consuming
//		$handle = fopen($urls[0], "rb");
//		$ggbbinary = stream_get_contents($handle);
		echo $urls[0];
//		fclose($handle);
//		$ggbBase64 = base64_encode(file_get_contents($urls[0]));
		
		//TODO: !!! what to do with more then one URL
		//TODO: !!! All the params
		$return = '<applet codebase="./" width="'.$width.'" height="'.$height.'" '
				. 'archive="'.$CFG->filter_geogebra_urljar.'"'
				. ' code="geogebra.GeoGebraApplet">'
				. '<param name="filename"  value="'.$urls[0].'"/>'.$this->params_html.'</applet> ';
//				. '<param name="ggbBase64"  value="'.$ggbBase64.'"/>'.$this->params_html.'</applet> ';
		return $return;
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

//TODO: Rest of the params
function filter_geogebra_build_params($localconfig) {
	global $CFG;
	$params = 
		'<param name="enableRightClick" value="'.
		(isset($localconfig['filter_geogebra_enable_rightclick']) ? 
			($localconfig['filter_geogebra_enable_rightclick'] ? "true" : "false") :
			($CFG->filter_geogebra_enable_rightclick ? "true" : "false")) . '" />';
	
	
	return $params;
}
