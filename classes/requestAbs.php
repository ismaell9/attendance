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
 * Class to request excuse to absence
 *
 * @package   mod_attendance
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/mod/attendance/locallib.php');

/**
 * Class that computes summary of users points
 *
 * @package   mod_attendance
 * @copyright som3a
 */
class requestAbs {

    /** @var int user id */
    private $userid;

    /** @var stdclass course course data*/
    private $course;

    /** @var string excuse */
    private $excuse;

    /**
     * Initializes the class
     *
     * @param int $attendanceid instance identifier
     * @param array $userids user instances identifier
     * @param int $startdate Attendance sessions startdate
     * @param int $enddate Attendance sessions enddate
     */
    public function __construct($attendanceid, $userid, $excuse) {
        $this->attendanceid = $attendanceid;
        $this->userid = $userid;
        $this->excuse = $excuse;
    }

    /**
     * @param string $excuse
     * @return bolean sucess or not
     */
    public function request_abs(){
          /**   add table excuse into data base and join it with attendance plugin database */
    }

    /**
     * Returns true if the corresponding attendance instance is currently configure to work with grades (points)
     *
     * @return boolean
     */
