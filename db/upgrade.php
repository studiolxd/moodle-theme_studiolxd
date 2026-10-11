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
 * Upgrade steps for theme_studiolxd.
 *
 * @package    theme_studiolxd
 * @copyright  2026 Studio LXD
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Upgrade the theme.
 *
 * @param int $oldversion The version we are upgrading from.
 * @return bool
 */
function xmldb_theme_studiolxd_upgrade($oldversion) {
    if ($oldversion < 2026101101) {
        // The appearance settings were removed: the theme is driven by code only.
        $removed = ['preset', 'presetfiles', 'backgroundimage', 'loginbackgroundimage', 'brandcolor', 'scsspre', 'scss'];
        foreach ($removed as $name) {
            unset_config($name, 'theme_studiolxd');
        }

        // Delete any files uploaded to the removed file settings.
        $fs = get_file_storage();
        $context = context_system::instance();
        foreach (['preset', 'backgroundimage', 'loginbackgroundimage'] as $filearea) {
            $fs->delete_area_files($context->id, 'theme_studiolxd', $filearea);
        }

        upgrade_plugin_savepoint(true, 2026101101, 'theme', 'studiolxd');
    }

    return true;
}
