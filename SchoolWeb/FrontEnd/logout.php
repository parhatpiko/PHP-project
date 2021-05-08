<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/20
 * Time: 10:54
 */


session_save_path('D:/IDE/PHPServer/php7/session');
session_start();
$_SESSION['login_flag'] = '2';
header("location: index.php");
exit();

?>