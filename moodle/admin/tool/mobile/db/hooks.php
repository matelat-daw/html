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
 * Hook callbacks for Moodle app tools
 *
 * @package    tool_mobile
 * @copyright  2024 Juan Leyva
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$callbacks = [
    [
        'hook' => core\hook\user\after_complete_login::class,
        'callback' => 'tool_mobile\local\hooks\user\after_complete_login::callback',
        'priority' => 500,
    ],
    [
        'hook' => tool_mfa\hook\after_user_passed_mfa::class,
        'callback' => 'tool_mobile\local\hooks\user\after_user_passed_mfa::callback',
        'priority' => 500,
    ],
];
