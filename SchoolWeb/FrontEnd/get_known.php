<?php

session_save_path('D:/IDE/PHPServer/php7/session');

//启动session
session_start();

global $id;
$id="2";

require_once ".././common/lib/MysqliDb.php";
$db = new MysqliDb('localhost','root','Gulnur#','news');
$db->where('category_id',$id);
$arr_rules =$db->get('rules');
$row="";
if($arr_rules)
{
    $row = $arr_rules[0];
}

?>
<!Doctype html>
<html lang="zh-CN">
<head>
<title>报名须知 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/register.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/font-awesome.min.css" type="text/css" />
</head>
<body>

<!-- ####################################################################################################### -->
<div class="row  top-left" style="padding-top: 300px; background-size: 1300px; background-repeat: no-repeat;background-image: url('./images/logo.jpg')  ">
    <img src="images/logo_title.png" style="position: absolute;top: 0.1px;left: 2px" >
</div>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="logout.php" style="padding-top: 10px;"><?php if($_SESSION['login_flag']=='1') { ?><img src="images/judge.png" style="max-height: 30px;"/><?php }?></a>
    </div>

    <div class="container-fluid col-lg-offset-3">
        <ul class="nav navbar-nav">
            <li><a href="index.php">主页</a></li>
            <li class="active"><a href="get_known.php">报名须知</a></li>
            <li ><a href="get_rules.php">竞赛规则</a></li>
            <li><a href="team_register.php">注册报名</a></li>
            <li ><a href="itemlist.php">历届回顾</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="judge_.php"><span class="glyphicon glyphicon-log-in"></span>评委登录</a></li>
            <li><?php if((@@@$_SESSION['login_flag']=='1')) { ?><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>退出</a><?php }?></li>
        </ul>
    </div>
    <div class="wrapper col2 ">
        <div id="breadcrumb">
            <ul>
                <li class="first">您在这里</li>
                <li>&#187;</li>
                <li><a href="#">报名须知</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container-fluid">
      <div class="col-lg-offset-1 col-lg-10">
      <?php echo $row['content'] ?>
      </div>
    </div>

<!-- ####################################################################################################### -->
<div class="wrapper col5" >
    <div id="copyright">
        <p class="fl_left">Copyright &copy; 2017 - <?php echo date('Y')?>All Rights Reserved - <a href="index.php">浙江大学生物信息竞赛</a></p>
        <p class="fl_right" style="font-style: italic">Author@HT Email:parhatpiko@gamil.com</p>
        <br class="clear" />
    </div>
</div>
</body>
</html>