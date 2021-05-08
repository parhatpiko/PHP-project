<?php
require_once '.././common/lib/MysqliDb.php';
session_save_path('D:/IDE/PHPServer/php7/session');
session_start();

$db = new MysqliDb('localhost','root','Gulnur#','news');
if(!$_GET)
{
    echo"<script>window.close()</script>>";
}
$id = $_GET['id'];
$team_specified_data =[
    'content_topic',
    'year',
    'pic',
    'about_item',
    'team_name',
    'veri_code',
    'pdf_flag',
    'ppt_flag',
    'zip_flag'
];
$arr_pdf_info=[
    'filename',
    'filepath'
];
$arr_ppf_info=[
    'filename',
    'filepath'
];
$_arr_zip_info=[
    'filename',
    'filepath'
];

$arr_team_data = $db->where('id',$id)->get('team',null,$team_specified_data);
$row="";
if ($arr_team_data)
{
    $row = $arr_team_data[0];
}
$pdf_info = $db->where('veri_code',$row['veri_code'])->get('item_pdf',null,$arr_pdf_info);
$ppt_info = $db->where('veri_code',$row['veri_code'])->get('item_ppt',null,$arr_ppt_info);
$zip_info = $db->where('veri_code',$row['veri_code'])->get('item_zip',null,$arr_zip_info);
if($row['pdf_flag']==1)
{
    $pdf_info=0;
}
if($row['ppt_flag']==1)
{
    $ppt_info=0;
}
if($row['zip_flag']==1)
{
    $zip_info=0;
}
?>

<!doctype html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/html">
<head>
<title>项目浏览</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<link rel="stylesheet" href="layout/styles/bootstrap.min.css" type="text/css" />
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
                <li><a href="#">项目浏览</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- ####################################################################################################### -->
<!--<div class="wrapper col2">-->
<!--  <div id="breadcrumb">-->
<!--    <ul>-->
<!--      <li class="first">You Are Here</li>-->
<!--      <li>&#187;</li>-->
<!--      <li><a href="#">Home</a></li>-->
<!--      <li>&#187;</li>-->
<!--      <li><a href="#">Grand Parent</a></li>-->
<!--      <li>&#187;</li>-->
<!--      <li><a href="#">Parent</a></li>-->
<!--      <li>&#187;</li>-->
<!--      <li class="current"><a href="#">Child</a></li>-->
<!--    </ul>-->
<!--  </div>-->
<!--</div>-->
<!-- ####################################################################################################### -->

<div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-10 col-lg-offset-1 ">

            <!-- Title -->
            <h1 class="mt-4 text-center" ><?php echo $row['content_topic']?></h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#"><?php echo $row['team_name']?></a>
            </p>

            <hr>
            <!-- Preview Image -->
            <div class="row">
                <div class="col-sm-6 col-lg-push-3">
                    <img class="img-fluid rounded"width="450" height="300" src="<?php echo $row['pic']?>" alt="">
                </div>
            </div>
            <hr>
                 <pre>
                     <?php echo $row['about_item']?>
                 </pre>
            <hr>
            //About Pdf
            <?php
             if(isset($pdf_info)) {
                 ?>
                 <a href="read_pdf.php?filepath=<?php echo $pdf_info[0]['filepath'] ?>">
                     <h2><?php echo $pdf_info[0]['filename'] ?></h2></a>
                 <?php
             }
           ?>
            //About PPT
            <?php
            if((@@@$_SESSION['login_flag']=='1')&&$ppt_info) {
                ?>
                <a href="download.php?filename=<?php echo $ppt_info[0]['filename']?>&filepath=<?php echo $ppt_info[0]['filename'] ?>">
                    <h2><?php echo $ppt_info[0]['filename'] ?></h2></a>
                <?php
            }
            ?>
            /About ZIP
            <?php
            if((@@@$_SESSION['login_flag']=='1')&&$ppt_info) {
                ?>
                <a href="download.php?filename=<?php echo $ppt_info[0]['filename']?>&filepath=<?php echo $zip_info[0]['filename'] ?>">
                    <h2><?php echo $zip_info[0]['filename'] ?></h2></a>
                <?php
            }
            ?>
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