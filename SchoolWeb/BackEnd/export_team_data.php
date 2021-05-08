<?php
require_once  '../common/lib/authenticate.php';
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/8
 * Time: 15:29
 */
require_once '../common/lib/MysqliDb.php';
require_once '../common/lib/php-export-data.class.php';

$db = new MysqliDb('localhost','root','Gulnur#','news');
$cols = [
    'team_name',
    'commander_name',
    'commander_major',
    'commander_collage',
    'commander_email',
    'commander_cell',
    'member1_name',
    'member1_major',
    'member1_collage',
    'member1_email',
    'member1_cell',
    'member2_name',
    'member2_major',
    'member2_collage',
    'member2_email',
    'member2_cell',
    'member3_name',
    'member3_major',
    'member3_collage',
    'member3_email',
    'member3_cell',
    'member4_name',
    'member4_major',
    'member4_collage',
    'member4_email',
    'member4_cell',
    'guide_teacher',
    'guide_contact',
    'year'

];
$arr_team = $db->get('team',null,$cols);


// 'browser' tells the library to stream the data directly to the browser.
// other options are 'file' or 'string'
// 'test.xls' is the filename that the browser will use when attempting to
// save the download
$exporter = new ExportDataExcel('browser', 'team_info.xls');

$exporter->initialize(); // starts streaming data to web browser

// pass addRow() an array and it converts it to Excel XML format and sends
// it to the browser
$exporter->addRow($cols);

foreach ($arr_team as $item) {
      $exporter->addRow($item );
}
// doesn't care how many columns you give it
//$exporter->addRow(array("foo"));

$exporter->finalize(); // writes the footer, flushes remaining data to browser.

exit(); // all done

?>

?>