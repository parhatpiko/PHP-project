<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/11
 * Time: 2:26
 */
//cookie found, is it really someone from the
setcookie('username', -1, time()-3600);
setcookie('password', -1, time()-3600);
setcookie('login_flag', -1, time()-3600);
unset($_COOKIE['username']);
unset($_COOKIE['password']);
unset($_COOKIE['login_flag']);
session_save_path('D:/IDE/PHPServer/php7/session');
session_start();
session_unset();
session_destroy();
unset($_SESSION['admin_login']);
unset($_SESSION['login_flag']);
header("location: .././FrontEnd");
?>
