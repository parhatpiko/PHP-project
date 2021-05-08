<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/11
 * Time: 1:52
 */
require_once '../common/lib/MysqliDb.php';
$id="";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
$display_flag=[
    'display_flag'=>'允许'
];
$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
$result = $db->where('id',$id)->update('team',$display_flag);
if($result)
{
    header("Location: team_display.php");
}
?>