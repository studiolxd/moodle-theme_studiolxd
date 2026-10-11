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
 * Theme settings for theme_studiolxd.
 *
 * Appearance is driven by the theme code only, so there are no appearance settings here.
 *
 * @package    theme_studiolxd
 * @copyright  2026 Studio LXD
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // Blocks to be excluded when this theme is enabled in the "Add a block" list: Administration, Navigation and Courses.
    $setting = new admin_setting_configtext(
        'theme_studiolxd/unaddableblocks',
        get_string('unaddableblocks', 'theme_studiolxd'),
        get_string('unaddableblocks_desc', 'theme_studiolxd'),
        'navigation,settings,course_list',
        PARAM_TEXT
    );
    $settings->add($setting);
}
