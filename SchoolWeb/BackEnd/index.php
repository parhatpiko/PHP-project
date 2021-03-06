<?php
require_once '../common/lib/authenticate.php'

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href=".././FrontEnd" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="del_cookie.php" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="logout.php"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="list.php" ><span class="icon-caret-right"></span>内容管理</a></li>
<!--    <li><a href="add.php"><span class="icon-caret-right"></span>添加内容</a></li>-->
    <li><a href="cate.php"><span class="icon-caret-right"></span>分类管理</a></li>
    <li class="dropdown">
      <a data-toggle="dropdown" href="#">
          <span class="icon-caret-right"></span>须知/规则</a>
      <ul class="dropdown-menu">
          <li><a href="add_rules.php?id=1">报名须知</a></li>
          <li><a href="add_rules.php?id=2">竞赛规则</a></li>
          <li><a href="add_rules.php?id=3">首页-左</a></li>
          <li><a href="add_rules.php?id=4">首页-右</a></li>
      </ul>
    </li>
    <li><a href="export_team_data.php"><span class="icon-caret-right"></span>导出学生信息</a></li>
    <li><a href="team_display.php"><span class="icon-caret-right"></span>参赛队伍管理</a></li>
    <li><a href="judge_display.php"><span class="icon-caret-right"></span>评委管理</a></li>
    <li><a href="sponsor_display.php"><span class="icon-caret-right"></span>赞助公司信息管理</a></li>


      <!--    <li><a href="specialist_introduction_add.php"><span class="icon-caret-right"></span>专家介绍</a></li>-->
<!--      <li><a href="specialist_display.php"><span class="icon-caret-right"></span>专家介绍列表</a></li>-->
  </ul>
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);
	  $(this).toggleClass("on");
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.html" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>