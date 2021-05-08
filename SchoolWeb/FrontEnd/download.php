<?php
if(empty($_GET))
{
    exit();
}
$filename = ($_GET['filename']);
$filepath = ($_GET['filepath']);
//$filepath = '.././BackEnd/upload/item_ppt/_1506960327cc.ppt' ;
var_dump($_GET);
if(!$filepath){ // file does not exist
die('file not found');
} else {
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: binary");

// read the file from disk
readfile($filepath);
}
?>