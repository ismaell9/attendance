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
 * Temporary user management.
 *
 * @package    mod_attendance
 * @copyright  2013 Davo Smith, Synergy Learning
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__).'/../../config.php');
global $CFG, $DB, $OUTPUT, $PAGE, $COURSE;
require_once($CFG->dirroot.'/mod/attendance/locallib.php');
require_once(dirname(__FILE__).'/renderables.php');
require_once(dirname(__FILE__).'/renderhelpers.php');




$id     = required_param('id', PARAM_INT);

$cm     = get_coursemodule_from_id('attendance', $id, 0, false, MUST_EXIST);

$context = context_module::instance($cm->id);
require_capability('mod/attendance:export', $context);



$course         = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
$att            = $DB->get_record('attendance', array('id' => $cm->instance), '*', MUST_EXIST);

require_login($course, true, $cm);

$att            = new mod_attendance_structure($att, $cm, $course, $context);


$PAGE->set_url($att->url_requestAbs());
$formparams = array('course' => $course, 'cm' => $cm, 'modcontext' => $context);



require_login($course, true, $cm);
$context = context_module::instance($cm->id);

require_capability('mod/attendance:managetemporaryusers', $context);

$PAGE->set_title($course->shortname.": ".$att->name.' - '.get_string('requestabs', 'attendance'));
$PAGE->set_heading($course->fullname);
$PAGE->set_cacheable(true);
$PAGE->navbar->add(get_string('requestabs', 'attendance'));

$output = $PAGE->get_renderer('mod_attendance');
$tabs = new attendance_tabs($att, attendance_tabs::TAB_TEMPORARYUSERS);

// Output starts here.
echo $output->header();
echo $output->heading(get_string('requestabs', 'attendance').' : '.format_string($course->fullname));
echo $output->render($tabs);

//$tempusers = $DB->get_records('attendance_tempusers', array('courseid' => $course->id), 'fullname, email');

echo '<div>';
    echo '<h1> hello people </h1>';
echo '</div>';

echo $output->footer($course);

/**
 * Print list of users.
 *
 * @param stdClass $tempusers
 * @param mod_attendance_structure $att
 */



