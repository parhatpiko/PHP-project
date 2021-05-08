<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/26
 * Time: 16:29
 */
require_once '../common/lib/MysqliDb.php';
$id="";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
$authen_flag=[
    'authen_flag'=>'允许'
];
$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
$result = $db->where('id',$id)->update('judge',$authen_flag);
if($result)
{
    header("Location: judge_display.php");
}
?>