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
 * Strings for component 'qbehaviour_adaptivepenalty', language 'en'.
 *
 * @package    qbehaviour
 * @subpackage adaptivepenalty
 * @copyright  2016 Daniel Thies <dthies@ccal.edu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Adaptive mode with prejudice';
$string['gradingdetails'] = 'Marks for this submission: {$a->raw}/{$a->max}. Accounting late submission, this gives <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailswithadjustment'] = 'Marks for this submission: {$a->raw}/{$a->max}. Accounting for previous tries and late submission, this gives <strong>{$a->cur}/{$a->max}</strong>.';
$string['gradingdetailswithadjustmentpenalty'] = 'Marks for this submission: {$a->raw}/{$a->max}. Accounting for previous tries and late submission, this gives <strong>{$a->cur}/{$a->max}</strong>. This submission attracted a penalty of {$a->penalty}.';
$string['gradingdetailswithadjustmenttotalpenalty'] = 'Marks for this submission: {$a->raw}/{$a->max}. Accounting for previous tries and late submission, this gives <strong>{$a->cur}/{$a->max}</strong>. This submission attracted a penalty of {$a->penalty}. Total penalties so far: {$a->totalpenalty}.';
