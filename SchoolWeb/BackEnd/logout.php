<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/11
 * Time: 2:23
 */
session_save_path('D:/IDE/PHPServer/php7/session');
session_start();
session_unset();
session_destroy();
unset($_SESSION['admin_login']);
header("location: .././FrontEnd");
exit();
?>
