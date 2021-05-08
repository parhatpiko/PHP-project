<?php

session_save_path('D:/IDE/PHPServer/php7/session');


//启动session
session_start();


require_once '../common/lib/MysqliDb.php';
$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
$arr_news = $db->get("news",5);
$arr_team = $db->get('team',4);
$arr_sponsor = $db->get('sponsor',5);
$arr_rules= $db->orderBy('category_id')->get('rules',5);

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<title>浙江大学生物信息竞赛</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
  <link rel="stylesheet" href="layout/styles/w3.css" type="text/css" />
  <link rel="stylesheet" href="layout/styles/bootstrap.min.css" type="text/css" />
  <script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
  <script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
  <script type="text/javascript" src="layout/scripts/jquery.cycle.min.js"></script>
  <script type="text/javascript">
      $(function() {
          $('#featured_slide').after('<div id="fsn"><ul id="fs_pagination">').cycle({
              timeout: 5000,
              fx: 'fade',
              pager: '#fs_pagination',
              pause: 1,
              pauseOnPagerHover: 0
          });
      });
      function ixak_gulnur()
      {
          $(document).ready(function(){
              $(document).mouseenter(function(){
                  $("#box").animate({top: _random(10,$(window ).height() ),left: _random(11,$( document ).width()-50)},8000,ixak_gulnur());
              });
              $("#off").click(function () {
                  $("#box").hide();
              });
              $("#box").mouseenter(function () {
                  $("#box").stop(true,false);
              });
              $("#box").mouseleave(function () {
                  $("#box").animate({top: _random(10,$(window ).height() ),left: _random(11,$( document ).width()-50)},8000,ixak_gulnur());
              });
          });
      }
//      function aski_gulnur()
//      {
//          $(document).mouseenter(function() {
//              $("#box").animate({
//                  top: _random(10, $(window).height()),
//                  left: _random(11, $(document).width() - 50)
//              }, 8000, function () {
//                  ixak_gulnur();
//              });
//          });
//          $("#off").click(function () {
//              $("#box").hide();
//          });
//          $("#box").mouseenter(function () {
//              $("#box").stop();
//          });
//          $("#box").mouseleave(function () {
//              ixak_gulnur();
//          });
//      }

      function _random(m,n)
      {
          m = parseInt(m);
          n = parseInt(n);
          return Math.floor( Math.random() * (n - m + 1) ) + m;
      }

      ixak_gulnur();
  </script>


</head>
<body>

<!-- ####################################################################################################### -->

<div class="row  top-left" style="padding-top: 300px; background-size: 1300px; background-repeat: no-repeat;background-image: url('./images/logo.jpg')  ">
    <img src="images/logo_title.png" style="position: absolute;top: 0.1px;left: 2px" >
</div>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="logout.php" style="padding-top: 10px;"><?php if((@@@$_SESSION['login_flag']=='1')) { ?><img src="images/judge.png" style="max-height: 30px;"/><?php }?></a>
    </div>
  <div class="container-fluid col-lg-offset-3">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">主页</a></li>
      <li><a href="get_known.php">报名须知</a></li>
      <li><a href="get_rules.php">竞赛规则</a></li>
      <li><a href="team_register.php">注册报名</a></li>
      <li class="last"><a href="itemlist.php">历届回顾</a></li>
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
        <li><a href="#">主页</a></li>
      </ul>
    </div>
  </div>
</nav>
 <!-- ####################################################################################################### -->

<div class="wrapper col2">
    <div id="featured_slide">
        <?php
        foreach ( $arr_news as $item)
        {
            ?>
        <div class="featured_box"><a href="#"><img src=".././BackEnd/<?php echo $item['pic'];?>" width="450" height="290" alt="Oops No pic..."/></a>
            <div class="floater">
                <h2><?php echo $item['title'];?></h2>
                <p><?php echo $item['tag'];?></p>
                <p class="readmore"><a href="news.php?id=<?php echo $item['id'];?>">Continue Reading &raquo;</a></p>
            </div>
        </div>
        <?php
        }
      ?>

  </div>
    <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
      <div class="column2">
        <ul>
          <li>
            <h2>规则</h2>
            <div class="imgholder"><img width="240" height="130" src="images/rules_left.jpg" alt="OOps" /></div>
            <p><?php echo substr($arr_rules[1]['tag'],0,120)."...";?></p>
            <p class="readmore"><a href="rules_left.php">Continue Reading &raquo;</a></p>
          </li>
          <li class="last">
            <h2>须知</h2>
            <div class="imgholder"><img width="240" height="130" src="images/rules_rught.jpg" alt="OOps" /></div>
            <p><?php echo substr($arr_rules[1]['tag'],0,120)."...";?></p>
            <p class="readmore"><a href="rules_right.php">Continue Reading &raquo;</a></p>
          </li>
        </ul>
        <br class="clear" />
      </div>
      <div class="column2">
          <h2><font  size="6" color="#6495ed">十分感谢以下公司</font></h2>
<!--          <div class="row" >-->
              <?php
              foreach ($arr_sponsor as $item)
              {
                  ?>
                  <div class="col-sm-2">
                      <a href="<?php echo $item['sponsor_url'];?>"><img style="display: table-row" width="80" height="80" src=".././BackEnd/<?php echo $item['sponsor_pic']; ?>" alt="Oops No pics"/></a>
                      <p><strong><?php echo substr($item['sponsor_name'],0,10);?></strong></p><br>
                  </div>
                  <?php
              }
              ?>
<!--          </div>-->
      </div>
    </div>

    <div class="fl_right">
      <h2>火热报名中~</h2>
      <ul>
          <?php
          foreach ($arr_team as $item)
          {
              ?>
              <li>
                  <div class="imgholder"><a href="#"><img width="80" height="80" src=".././BackEnd/<?php echo $item['pic']; ?>" alt="Oops No pics"/></a></div>
                  <p>
                      <strong><a href="#"><?php ;?></a></strong>
                  </p>
                  <p><?php echo substr($item['sponsor_introduction'],0,50).'...'; ?></p>              </li>
              <?php
          }
          ?>
      </ul>
    </div>
    <br class="clear" />
  </div>
    <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4 ">
  <div id=" footer" class="col-lg-offset-1">
      <h2 class="text-left">友情链接</h2>
      <ul class="nav navbar-nav">
        <li><a href="http://www.cls.zju.edu.cn/binfo/ZJBS/index.html">浙江省生物信息学会</a></li>
        <li><a href="http://www.zju.edu.cn">浙大主页</a></li>
        <li><a href="http://www.xgb.zju.edu.cn/">浙江大学学工部</a></li>
        <li><a href="http://ugrs.zju.edu.cn">本科生院</a></li>
        <li><a href="http://www.cls.zju.edu.cn">浙大生物科学院</a></li>
        <li class="last"><a href="http://www.cmm.zju.edu.cn/">医学院</a></li>
      </ul>
    </div>
    <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5" >
    <div id="copyright">
        <p class="fl_left"><a href=".././BackEnd">管理</a>########</p>
        <p class="fl_left">Copyright &copy; 2017 - <?php echo date('Y')?>All Rights Reserved - <a href="index.php">浙江大学生物信息竞赛</a></p>
        <p class="fl_right" style="font-style: italic">Author@HT Email:parhatpiko@gamil.com</p>
        <br class="clear" />
    </div>
</div>

<div id="box" style="overflow:;background-image: url('images/notice_bar.jpg');height:100px;width:350px;margin:6px;position:absolute;">
    <img id= "off" src="images/t3.png" style="margin-left: 100%">
    <h3 class="text-center ">开始报名啦</h3>
    <br class="clear" />
</div>
</body>
</html>
Register: //QQ mail;
// time out prohibated;
// security
// 换位思考
// 虚心接受
// team register background
// 站在用户
// 毛躁不安
// 精细
// judge 退出
// 这里是XXX