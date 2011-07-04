<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Media filter post install hook
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_filter_geogebra_install() {
    global $CFG;

    //TODO: TEXTFILTER_INHERIT but the condition is wrong
    //We do not activate the filter, we set it to off - but available
    //The filter can than be activated in the context of a course or Activity
    //but only if the filter hasn't been active site-wide before
    if (empty($CFG->filter_geogebra_defaultwidth)) {
        filter_set_global_state('filter/geogebra', TEXTFILTER_INHERIT);
    }
}
