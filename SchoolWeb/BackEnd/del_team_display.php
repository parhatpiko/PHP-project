<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/11
 * Time: 1:27
 */
//var_dump($_GET);
require_once '../common/lib/MysqliDb.php';
require_once '../common/lib/authenticate.php';
$id="";
$veri_code="";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
if(isset($_GET['$veri_code']))
{
    $veri_code = $_GET['$veri_code'];
}
$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
$db->where('id',$id)->delete('team');
//var_dump($veri_code);
$result = $db->where('veri_code',$_GET['veri_code'])->delete('pdf_item');
$result = $db->where('veri_code',$_GET['veri_code'])->delete('ppt_item');
$result = $db->where('veri_code',$_GET['veri_code'])->delete('zip_item');
if($result)
{
    header("Location: team_display.php");
}
?>