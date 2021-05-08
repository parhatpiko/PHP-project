<?php

session_save_path('D:/IDE/PHPServer/php7/session');

//启动session
session_start();

require_once '.././common/lib/MysqliDb.php';
require_once '.././common/lib/upload_manager.php';
// initialize the db object using MysqliDb.php
$db=new MysqliDb('localhost','root','Gulnur#','news');
global $team_pic;
global $code;
$team_pic="";
// upload pics
$pic_path = new get_pic_path('0');
$team_pic=$pic_path->get_picpath();

$code = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

//get the current year;
$year = date("Y");
if($_POST)
{
    $data_team=[
        'content_topic'=>$_POST['content_topic'],
        'team_name'=> $_POST['team_name'],
        'commander_name'=>$_POST['commander_name'],
        'commander_major'=>$_POST['commander_major'],
        'commander_collage'=>$_POST['commander_collage'],
        'commander_email'=>$_POST['commander_email'],
        'commander_cell'=>$_POST['commander_cell'],
        'member1_name'=>$_POST['member1_name'],
        'member1_major'=>$_POST['member1_major'],
        'member1_collage'=>$_POST['member1_collage'],
        'member1_email'=>$_POST['member1_email'],
        'member1_cell'=>$_POST['member1_cell'],
        'member2_name'=>$_POST['member2_name'],
        'member2_major'=>$_POST['member2_major'],
        'member2_collage'=>$_POST['member2_collage'],
        'member2_email'=>$_POST['member2_email'],
        'member2_cell'=>$_POST['member2_cell'],
        'member3_name'=>$_POST['member3_name'],
        'member3_major'=>$_POST['member3_major'],
        'member3_collage'=>$_POST['member3_collage'],
        'member3_email'=>$_POST['member3_email'],
        'member3_cell'=>$_POST['member3_cell'],
        'member4_name'=>$_POST['member4_name'],
        'member4_major'=>$_POST['member4_major'],
        'member4_collage'=>$_POST['member4_collage'],
        'member4_email'=>$_POST['member4_email'],
        'member4_cell'=>$_POST['member4_cell'],
        'guide_teacher'=>$_POST['guide_teacher'],
        'guide_contact'=>$_POST['guide_contact'],
        'pic'=>$team_pic,
        'about_item'=>$_POST['about_item'],
        'key_tag'=>$_POST['key_tag'],
         'veri_code'=>$code,
         'pdf_flag'=>'1',
          'ppt_flag'=>'1',
          'zip_flag'=>'1',
         'display_flag'=>'待定',
         'created_time'=>date("Y-m-d H:i:s"),
         'year'=>$year
    ];
//    var_dump($data_team);
    $team_result = $db->insert('team',$data_team);
    if($team_result)
    {
        echo"<script> alert('报名成功')</script>";
        echo"<script> alert('请记住:'+$code)</script>";
        echo"<script> alert('请记住:'+$code)</script>";
        echo "<script>window.open('Item_upload.php')</script>";
        echo "<script>window.close()</script>";

    }
    else
    {
        echo"<script> alert('注册失败')</script>";
    }
}
?>

<!Doctype html>
<html lang="zh-CN">
<head>
<!--    !!! Note import the jQuery first and register.js, cause it is based on the jQuery-->
<title>School Education | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
  <link rel="stylesheet" href="layout/styles/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="layout/styles/register.css" type="text/css" />
  <link rel="stylesheet" href="layout/styles/w3.css" type="text/css" />
  <script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
  <script type="text/javascript" src="layout/scripts/register.js"></script>
   <style>
       input[type=text]
       {
           background-color: wheat;
           color: mediumblue;

       }
       input[type=email]
       {
           background-color: wheat;
           color: mediumblue;

       }

       input[type=file]
       {
           background-color: wheat;
           color: white;

       }
       label{
           color: #31b0d5;
       }
   </style>
</head>
<body style="background-size: 1280px 2400px;  background-repeat: no-repeat;background-image: url('./images/register.jpg') ">
</div>
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
                <li class="active"><a href="team_register.php">注册报名</a></li>
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
                    <li><a href="#">注册报名</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!-- ####################################################################################################### -->

<div class="container-fluid ">
  <h1 class=" text-center" >报名表</h1>
    <div class="col-sm-2 sidenav "style="background-color: #00aaee">
        <p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>
        <p><a href="#">Link</a></p>
    </div>
  <div class="col-sm-8">
    <div class="row">
      <form method="post" action="team_register.php" enctype="multipart/form-data">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label>参赛题目</label>
              <input type="text" name="content_topic" placeholder="参赛题目" class="form-control"required="required">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 form-group">
              <label>队名</label>
              <input type="text" placeholder="队名" name="team_name" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3 form-group">
                <label>队长</label>
                <input type="text" placeholder="队长姓名" name="commander_name" class="form-control" required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>学园</label>
                <input type="text" placeholder="学园/学院" name="commander_collage" class="form-control" required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>专业</label>
                <input type="text" placeholder="专业" name="commander_major" class="form-control"required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>邮箱</label>
                <input type="email" placeholder="邮箱" name="commander_email" class="form-control"required="required">
              </div>
              <div class="col-sm-6 form-group">
                <label>手机号</label>
                <input type="text" placeholder="手机号" name="commander_cell" class="form-control" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3 form-group">
                <label>队员1</label>
                <input type="text" placeholder="若没有请填 无" name="member1_name" class="form-control" required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>学园</label>
                <input type="text" placeholder="若没有请填 无" name="member1_collage" class="form-control" required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>专业</label>
                <input type="text" placeholder="若没有请填 无" name="member1_major" class="form-control" required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>邮箱</label>
                <input type="text" placeholder="若没有请填 无" name="member1_email" class="form-control"required="required">
              </div>
              <div class="col-sm-6 form-group">
                <label>手机号</label>
                <input type="text" placeholder="若没有请填 无" name="member1_cell" class="form-control" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3 form-group">
                <label>队员2</label>
                <input type="text" placeholder="若没有请填 无" name="member2_name" class="form-control"required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>学园</label>
                <input type="text" placeholder="若没有请填 无" name="member2_collage" class="form-control">
              </div>
              <div class="col-sm-4 form-group">
                <label>专业</label>
                <input type="text" placeholder="若没有请填 无" name="member2_major" class="form-control"required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>邮箱</label>
                <input type="text" placeholder="若没有请填 无" name="member2_email" class="form-control"required="required">
              </div>
              <div class="col-sm-6 form-group">
                <label>手机号</label>
                <input type="text" placeholder="若没有请填 无" name="member2_cell" class="form-control" required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3 form-group">
                <label>队员3</label>
                <input type="text" placeholder="若没有请填 无" name="member3_name" class="form-control"required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>学园</label>
                <input type="text" placeholder="若没有请填 无" name="member3_collage" class="form-control"required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>专业</label>
                <input type="text" placeholder="若没有请填 无" name="member3_major" class="form-control"required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>邮箱</label>
                <input type="text" placeholder="若没有请填 无" name="member3_email" class="form-control"required="required">
              </div>
              <div class="col-sm-6 form-group">
                <label>手机号</label>
                <input type="text" placeholder="若没有请填 无" name="member3_cell" class="form-control"required="required">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-3 form-group">
                <label>队员4</label>
                <input type="text" placeholder="若没有请填 无" name="member4_name" class="form-control" required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>学园</label>
                <input type="text" placeholder="若没有请填 无" name="member4_collage" class="form-control"required="required">
              </div>
              <div class="col-sm-4 form-group">
                <label>专业</label>
                <input type="text" placeholder="若没有请填 无" name="member4_major" class="form-control"required="required">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>邮箱</label>
                <input type="text" placeholder="若没有请填 无" name="member4_email" class="form-control">
              </div>
              <div class="col-sm-6 form-group">
                <label>手机号</label>
                <input type="text" placeholder="若没有请填 无" name="member4_cell" class="form-control"required="required">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 form-group">
              <label>指导老师</label>
              <input type="text" placeholder="指导老师姓名" name="guide_teacher" class="form-control" required="required">
            </div>
            <div class="col-sm-6 form-group">
              <label>联系方式</label>
              <input type="text" placeholder="指导老师联系方式" name="guide_contact" class="form-control" required="required">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label>选择一个队图</label>
                <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-default btn-file">
                          浏览… <input type="file"id="imgInp" name="pic">
                      </span>
                  </span>
                  <input type="text" class="form-control" name="" readonly required="required">
                </div>
                <img id='img-upload'/>
              </div>
            </div>
          </div>
<!--          <div class="form-group">-->
<!--            <label>项目描述（详细）</label>-->
<!--            <textarea class="form-control" name="about_item" rows="7" id="comment" required="required"></textarea>-->
<!--          </div>-->
            <div class="row">
                <div class="col-sm-11 form-group">
                    <label>关键词</label>
                    <input type="text" name="key_tag" placeholder="摘要" class="form-control"required="required">
                </div>
            </div>
            <div class="form-group">
                <div class=>
                    <label>内容：</label>
                </div>
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="about_item" type="text/plain"></script>
                    <!-- 配置文件 -->
                    <script type="text/javascript" src="../BackEnd/ueditor/ueditor.config.js"></script>
                    <!-- 编辑器源码文件 -->
                    <script type="text/javascript" src="../BackEnd/ueditor/ueditor.all.js"></script>
                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container', {
                            toolbars: [
                                [
                                    'bold', //加粗
                                    'italic', //斜体
                                    'underline', //下划线
                                    'strikethrough', //删除线
                                    'subscript', //下标
                                    'superscript', //上标
                                    'formatmatch', //格式刷
                                    'horizontal', //分隔线
                                    'fontfamily', //字体
                                    'fontsize', //字号
                                    'justifyleft', //居左对齐
                                    'justifyright', //居右对齐
                                    'justifycenter', //居中对齐
                                    'justifyjustify', //两端对齐
                                    'forecolor', //字体颜色
                                ]
                            ],
				            initialFrameWidth :673,
                            initialFrameHeight:300,
                        });
                    </script>
                </div>
            </div>
          <button type="submit" class="btn btn-lg btn-info">Submit</button>
      </form>
    </div>
  </div>
    <div class="col-sm-2 sidenav">
        <div style="font-size: 30px ;background-color: #00aaee;">
            <p>ADS</p>
        </div>
        <div style="font-size: 30px;background-color: #00aaee">
            <p>ADS</p>
        </div>
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