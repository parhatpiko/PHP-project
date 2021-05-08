<?php

session_save_path('D:/IDE/PHPServer/php7/session');
session_start();
require_once '.././common/lib/MysqliDb.php';
$db = new MysqliDb('localhost','root','Gulnur#','news');

if($_POST) {

//  var_dump($_POST);
$username = $_POST['username'];
$password = $_POST['password'];
$db->where('cell', $username);
$db->where('password', $password);
$authen_flag =[
'authen_flag'
];
$authen_flag_arr = $db->get('judge',null,$authen_flag);
$user = $db->get('judge');
//    $user = 1;
if ($user)
{

    if($authen_flag_arr[0]['authen_flag']=="允许")
    {
        $_SESSION['login_flag'] = '1';
        header('Location: index.php');
    }
    else
    {
    echo "<script>alert('帐户尚未为授权')</script>";
    //var_dump($user);
    }
}

elseif(empty($user))
    {
    echo "<script>alert('帐户或者密码错误！重新填写')</script>";
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>评委登录注册</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/judge_.js"></script>
<link href="layout/styles/judge_.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1>评委登录</sup>
</h1>

<div class="login" style="margin-top:50px;">
    
    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
			<a class="switch_btn" id="switch_login" href="javascript:void(0);" tabindex="8">快速注册</a><div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>    

    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 235px;">    

            <!--登录-->
            <div class="web_login" id="web_login">
                <div class="login-box">
			<div class="login_form">
             <form action="judge_.php" name="loginform" accept-charset="utf-8" id="login_form" class="loginForm" method="post"><input type="hidden" value="0"/>
               <input type="hidden" name="to" value="log"/>
                <div class="uinArea" id="uinArea">
                <label class="input-tips" for="u">帐号：</label>
                <div class="inputOuter" id="uArea">
                    <input type="text" id="u" placeholder="手机号" name="username" class="inputstyle"/>
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
               <label class="input-tips" for="p">密码：</label> 
               <div class="inputOuter" id="pArea">
                   <input type="password" placeholder="密码" id="p" name="password" class="inputstyle"/>
                </div>
                </div>
               
                <div style="padding-left:50px;margin-top:20px;">
                    <input type="submit"  value="登 录" style="width:150px;" class="button_blue"/>
                </div>
              </form>
           </div>
           
            	</div>
           </div>
            <!--登录end-->
  </div>

  <!--注册-->
    <div class="qlogin" id="qlogin" style="display: none; ">
   
    <div class="web_login">
        <form name="form2" id="regUser" accept-charset="utf-8"  action="judge_register.php" method="post">
	      <input type="hidden" name="to" value="reg"/>
          <input type="hidden" name="did" value="0"/>
          <ul class="reg_form" id="reg-ul">
        		<div id="userCue" class="cue">快速注册请注意格式</div>
                <li>
                	
                    <label for="user"  class="input-tips2">用户名：</label>
                    <div class="inputOuter2">
                        <input type="text" id="user" name="username" maxlength="16" class="inputstyle2" required="required"/>
                    </div>
                </li>
                
                <li>
                <label for="passwd" class="input-tips2">密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd"  name="password" maxlength="16" class="inputstyle2" required="required"/>
                    </div>
                </li>

                <li>
                <label for="passwd2" class="input-tips2">确认密码：</label>
                    <div class="inputOuter2">
                        <input type="password" id="passwd2" name="" maxlength="16" class="inputstyle2" required="required" />
                    </div>
                    
                </li>
                
                <li>
                 <label for="age" class="input-tips2">年龄：</label>
                    <div class="inputOuter2">

                        <input type="number" id="age" name="age" maxlength="2" class="inputstyle2" required="required"/>
                    </div>

                </li>

                <li>
                    <label for="position" class="input-tips2">职位：</label>
                    <div class="inputOuter2">
                        <input type="text" id="position" name="position" maxlength="10" class="inputstyle2" required="required"/>
                    </div>
                </li>

                <li>
                    <label for="cell" class="input-tips2">手机号：</label>
                    <div class="inputOuter2">
                        <input type="number" id="cell" name="cell" maxlength="11" class="inputstyle2" required="required"/>
                    </div>
                </li>

                <li>
                    <label for="cell2" class="input-tips2">确认手机号：</label>
                    <div class="inputOuter2">
                        <input type="number" id="cell2" name="cell2" maxlength="11" class="inputstyle2" required="required"/>
                    </div>
                </li>

                <li>
                    <div class="inputArea">
                        <input type="submit" id="reg" style="margin-top:10px;margin-left:85px;" class="button_blue" value="同意协议并注册"/> <a href="#" class="zcxy" target="_blank">注册协议</a>
                    </div>
                </li>
              <div class="cl"></div>
          </ul>
        </form>
    </div>

   </div>
    <!--注册end-->
</div>
<div class="jianyi">*推荐使用Firefox浏览器或Chrome内核浏览器访问本站</div>
</body></html>