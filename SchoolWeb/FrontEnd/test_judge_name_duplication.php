<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/26
 * Time: 21:11
 */

global $judge_cell;
$judge_cell="";
$judge_cell = $_GET['judge_cell'];
require_once '.././common/lib/MysqliDb.php';
$db = new  MysqliDb('localhost','root','Gulnur#','news');
$result =$db->where('cell',$judge_cell)->get('judge');
if($result)
{

//    echo"<script> alert('报名成功')</script>";
    echo"0";

}
else{

//    echo"<script> alert('未名成功')</script>";
    echo"1";
}

?>