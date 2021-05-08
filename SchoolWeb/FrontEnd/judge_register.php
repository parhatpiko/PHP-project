<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/19
 * Time: 21:35
 */

require_once '.././common/lib/MysqliDb.php';

// initialize the db object using MysqliDb.php
$db = new MysqliDb('localhost','root','Gulnur#','news');

if($_POST)
{
    $data_judge=[
        'username'=>$_POST['username'],
        'password'=>$_POST['password'],
        'position'=>$_POST['position'],
        'cell'=>$_POST['cell'],
        'age'=>$_POST['age'],
        'authen_flag'=>'待定',
        'created_time'=>date("Y-m-d H:i:s"),
    ];
//    var_dump($data_team);
    $team_result = $db->insert('judge',$data_judge);
    if($team_result)
    {
        echo"<script> alert('注册成功')</script>";
        echo "<script>window.open('index.php')</script>";
        echo "<script>window.close()</script>";

    }
    else
    {
        echo"<script> alert('注册失败')</script>";
    }
}
?>

