<?php  /// Moodle Configuration File

unset($CFG);

$CFG->dbtype    = 'mysql';
$CFG->dbhost    = 'mysql.moodle.logo24.com';
$CFG->dbname    = 'moodle_logo24_com';
$CFG->dbuser    = 'moodlelogo24com';
$CFG->dbpass    = 'THjygPMx';
$CFG->dbpersist =  true;
$CFG->prefix    = 'mdl_';

$CFG->wwwroot   = 'http://moodle.logo24.com';
$CFG->dirroot   = '/home/moodle123/moodle.logo24.com';
$CFG->dataroot  = '/home/moodle123/moodle.logo24.com_moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

require_once("$CFG->dirroot/lib/setup.php");
// MAKE SURE WHEN YOU EDIT THIS FILE THAT THERE ARE NO SPACES, BLANK LINES,
// RETURNS, OR ANYTHING ELSE AFTER THE TWO CHARACTERS ON THE NEXT LINE.
?>
