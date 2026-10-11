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
 * Theme functions for theme_studiolxd.
 *
 * The look of this theme is driven by code only: there are no appearance settings. The pre and extra SCSS
 * callbacks of Boost still run for this theme (Moodle calls the parents' callbacks too), but they read this
 * theme's settings, which do not exist, so they only add Boost's default login background image.
 *
 * @package    theme_studiolxd
 * @copyright  2026 Studio LXD
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Returns the main SCSS content: theme pre.scss, Boost's default preset and theme post.scss.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_studiolxd_get_main_scss_content($theme) {
    global $CFG;

    $pre = file_get_contents($CFG->dirroot . '/theme/studiolxd/scss/pre.scss');
    $preset = file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    $post = file_get_contents($CFG->dirroot . '/theme/studiolxd/scss/post.scss');

    return $pre . "\n" . $preset . "\n" . $post;
}

/**
 * Get precompiled CSS, used as a fallback when SCSS compilation fails.
 *
 * @return string
 */
function theme_studiolxd_get_precompiled_css() {
    global $CFG;
    return file_get_contents($CFG->dirroot . '/theme/boost/style/moodle.css');
}
