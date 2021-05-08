<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/4
 * Time: 14:00
 */
//注意 文件阅读器是这个@read_pdf 所以是要根据这个来设计目录结构噗。
$filepath= "";
if($_GET['filepath'])
{
    $filepath = $_GET['filepath'];
}
$filepath = mb_convert_encoding($filepath,"gbk");
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filepath . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filepath));
header('Accept-Ranges: bytes');
@readfile($filepath);
?>