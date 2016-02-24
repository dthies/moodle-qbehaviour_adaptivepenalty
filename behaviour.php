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
 * Question behaviour for the adaptive mode with prejudice.
 *
 * @package    qbehaviour
 * @subpackage adaptivepenalty
 * @copyright  2016 Daniel Thies
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . '/../adaptive/behaviour.php');

/**
 * Question behaviour for adaptive mode with prejudice.
 *
 * @copyright  2016 Daniel Thies <dthies@ccal.edu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class qbehaviour_adaptivepenalty extends qbehaviour_adaptive {

    protected function adjusted_fraction($fraction, $prevtries) {
        return $fraction - $this->question->penalty * ($prevtries + 1);
    }

    protected function adaptive_mark_details_from_step(question_attempt_step $gradedstep,
            question_state $state, $maxmark, $penalty) {

        $details = new qbehaviour_adaptive_mark_details($state);
        $details->maxmark    = $maxmark;
        $details->actualmark = $gradedstep->get_fraction() * $details->maxmark;
        $details->rawmark    = $gradedstep->get_behaviour_var('_rawfraction') * $details->maxmark;

        $details->currentpenalty = $penalty * $details->maxmark;
        $details->totalpenalty   = $details->currentpenalty + $details->currentpenalty * $this->qa->get_last_behaviour_var('_try', 0);

        $details->improvable = $this->is_state_improvable($gradedstep->get_state());

        return $details;
    }
}
