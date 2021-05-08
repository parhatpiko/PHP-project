<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/10
 * Time: 15:45
 */
session_save_path('D:/IDE/PHPServer/php7/session');

//启动session
session_start();

function _check_db($username,$password){
    require_once '../common/lib/MysqliDb.php';
    $db = new MysqliDb('localhost','root','Gulnur#','news');
    $db->where('username', $username);
    $db->where('password', $password);
    $user = $db->get('user');
    if($user)
    {
        return true;
    }
    else{
        return false;
    }

}
// cause here if the $_SESSION['admin_login'] has been set ,that means it already logged in
//so it is if(!isset($_SESSION['admin_login'])) that we start check the cookie
if(!isset($_SESSION['admin_login']))
{
    //check the cookie
    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        //cookie found, is it really someone from the
        if(_check_db($_COOKIE['username'], $_COOKIE['password'])) {
            $_SESSION['admin_login'] = $_COOKIE['username'];
            header("location: index.php");
            die();
        }
        else {
            header("location: login.php");
            die();
        }
    }
    else {
        header("location: login.php");
        die();
    }
}


?>