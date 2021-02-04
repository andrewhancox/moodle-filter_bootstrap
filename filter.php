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
 * @package filter_bootstrap
 * @author Andrew Hancox <andrewdchancox@googlemail.com>
 * @author Open Source Learning <enquiries@opensourcelearning.co.uk>
 * @link https://opensourcelearning.co.uk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright 2021, Andrew Hancox
 */

defined('MOODLE_INTERNAL') || die();

class filter_bootstrap extends moodle_text_filter {

    /**
     * Apply the filter to the text
     *
     * @param string $text to be processed by the text
     * @param array $options filter options
     * @return string text after processing
     * @see filter_manager::apply_filter_chain()
     */
    public function filter($text, array $options = array()) {
        if (strpos($text, '{bootstrap') === false) {
            return $text;
        }

        foreach ([
                'container'        => 'container',
                'row'              => 'row',
                'column_full'      => 'col-12',
                'column_twothirds' => 'col-8',
                'column_half'      => 'col-6',
                'column_third'     => 'col-4'
        ] as $key => $value) {
            $text = str_replace("{bootstrap $key}", "<div class='$value'>", $text);
            $text = str_replace("{/bootstrap $key}", "</div>", $text);
        }

        return $text;
    }
}
