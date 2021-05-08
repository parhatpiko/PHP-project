<?php

session_save_path('D:/IDE/PHPServer/php7/session');

//启动session
session_start();

global $year ;
if($_GET)
{
    $year =$_GET['year'];
}
require_once '.././common/lib/MysqliDb.php';
$db=new MysqliDb('localhost','root','Gulnur#','news');
$team_specified_data =[
        'id',
        'content_topic',
        'year',
        'pic',
        'key_tag',
         'team_name'
];
if($year)
{
    $db->where('display_flag','允许');
    $arr_team_data = $db->where('year',$year)->get('team',null,$team_specified_data);
}else
{
    $db->where('display_flag','允许');
    $arr_team_data = $db->get('team',null,$team_specified_data);
}
//$row="";
//if ($arr_team_data)
//{
//    $row = $arr_team_data[0];
//}
?>


<!Doctype html>
<head>
<title>项目列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/bootstrap.min.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/bootstrap.min.js"></script>
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
      <li><a href="get_known.php">报名须知</a></li>
      <li><a href="get_rules.php">竞赛规则</a></li>
      <li><a href="team_register.php">注册报名</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">历届回顾
         <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php
           for($i=2017;$i<=date('Y');$i++)
           {
           ?>
               <li><a href="itemlist.php?year=<?php echo $i?>"><?php echo $i?>年</a></li>
           <?php
           }
          ?>
        </ul>
      </li>
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
                <li><a href="#">历届优秀项目</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php ////echo $arr_team_datum['content_topic']?>
<?php ////echo $arr_team_datum['year']?>

<?php //////echo $arr_team_datum['about_item']?>
<!---->
<?php
//?>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<?php
foreach ($arr_team_data as $arr_team_datum)
{
?>
    <div class="well">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" width="150" height="130" src="<?php echo $arr_team_datum['pic']?>">
            </a>
            <div class="media-body">
                <a href="item.php?id=<?php echo $arr_team_datum['id'];?>"><h2 class="media-heading"><?php echo $arr_team_datum['content_topic']?></h2></a>
                <p class="text-right">by<a><?php echo $arr_team_datum['team_name'];?></a></p>
                    <p>
                        <?php echo substr($arr_team_datum['key_tag'],0,420) ?>
                    </p>
                <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $arr_team_datum['year']?></span></li
                </ul>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
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