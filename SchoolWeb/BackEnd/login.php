<?php
session_save_path('D:/IDE/PHPServer/php7/session');
session_start();
require_once '../common/lib/MysqliDb.php';
$db = new MysqliDb('localhost','root','Gulnur#','news');

if(!empty($_POST)) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $db->where('username', $username);
    $db->where('password', $password);
    $user = $db->get('user');
    if ($user) {
        //set the cookies for 1 day, ie, 1*24*60*60 secs
        //change it to something like 30*24*60*60 to remember user for 30 days
        setcookie('username', $username, time() + 1 * 24 * 60 * 60);
        setcookie('password', $password, time() + 1 * 24 * 60 * 60);
        setcookie('login_flag', 1, time() + 1 * 24 * 60 * 60);
        $_SESSION['admin_login'] = $username;
        header("Location: index.php");
    } else {
        echo "<script>alert('账户或者密码错误！重新填写')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
            <form action="login.php" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="username" placeholder="登录账号" data-validate="required:请填写账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>          
        </div>
    </div>
</div>
</body>
</html>