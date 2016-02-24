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
 * Renderer for outputting parts of a question belonging to the 
 * adaptive with prejudice behaviour.
 *
 * @package    qbehaviour
 * @subpackage adaptivepenalty
 * @copyright  2016 Daniel Thies <dthies@ccal.edu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '/../adaptive/renderer.php');


/**
 * Renderer for outputting parts of a question belonging adaptive mode 
 * with prejudice.
 *
 * @copyright  2016 Daniel Thies <dthies@ccal.edu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qbehaviour_adaptivepenalty_renderer extends qbehaviour_adaptive_renderer {

    protected function grading_details(qbehaviour_adaptive_mark_details $details, question_display_options $options) {

        $mark = $details->get_formatted_marks($options->markdp);

        if ($details->currentpenalty == 0 && $details->totalpenalty == 0) {
            return get_string('gradingdetails', 'qbehaviour_adaptive', $mark);
        }

        $output = '';

        // Print details of grade adjustment due to penalties
        if ($details->rawmark != $details->actualmark) {
            if ($details->totalpenalty == 2 * $details->currentpenalty && !$details->improvable) {
                return get_string('gradingdetails', 'qbehaviour_adaptivepenalty', $mark);
            } 
            if (!$details->improvable) {
                return get_string('gradingdetailswithadjustment', 'qbehaviour_adaptivepenalty', $mark);
            } else if ($details->totalpenalty > 2 * $details->currentpenalty) {
                return get_string('gradingdetailswithadjustmenttotalpenalty', 'qbehaviour_adaptivepenalty', $mark);
            } else {
                return get_string('gradingdetailswithadjustmentpenalty', 'qbehaviour_adaptivepenalty', $mark);
            }

        } else {
            if (!$details->improvable) {
                return get_string('gradingdetails', 'qbehaviour_adaptive', $mark);
            } else if ($details->totalpenalty > $details->currentpenalty) {
                return get_string('gradingdetailswithtotalpenalty', 'qbehaviour_adaptive', $mark);
            } else {
                return get_string('gradingdetailswithpenalty', 'qbehaviour_adaptive', $mark);
            }
        }

        return $output;
    }
}
