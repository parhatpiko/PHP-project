<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/26
 * Time: 16:31
 */
//var_dump($_GET);
require_once '../common/lib/MysqliDb.php';
require_once '../common/lib/authenticate.php';
$id="";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
$result = $db->where('id',$id)->delete('judge');
if($result)
{
    header("Location: judge_display.php");
}
?>