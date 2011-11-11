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
 * GeoGebra filter upgrade code
 *
 * @package    filter
 * @subpackage geogebra
 * @copyright  2011 Christoph Reinisch
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * @param int $oldversion the version we are upgrading from
 * @return bool result
 */
function xmldb_filter_geogebra_upgrade($oldversion) {
	global $CFG, $DB, $OUTPUT;

	if ($oldversion < 2011061301) {
		unset_config('filter_geogebra_params'); // migrated to the settings
		upgrade_plugin_savepoint(true, 2011061301, 'filter', 'geogebra');
	}
	if ($oldversion < 2011090500) {
		unset_config('filter_geogebra_use_browserforjs');
		upgrade_plugin_savepoint(true, 2011090500, 'filter', 'geogebra');
	}
	if ($oldversion < 2011091501) {
		unset_config('filter_geogebra_use_objecttag');
		unset_config('filter_geogebra_urljar');
		upgrade_plugin_savepoint(true, 2011091501, 'filter', 'geogebra');
	}
	unset_config('filter_geogebra_urljar');
	upgrade_plugin_savepoint(true, 2011111100, 'filter', 'geogebra');

	return true;
}
