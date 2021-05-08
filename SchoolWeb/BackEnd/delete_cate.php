<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/4
 * Time: 2:12
 */
$id="";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
error_reporting(E_ALL&E_NOTICE);  //report the errors;
$link = mysqli_connect("localhost","root","Gulnur#");

mysqli_query( $link,"SET character_set_client= utf8")or die(mysqli_error( $link));
mysqli_query( $link,"SET character_set_connection= utf8")or die(mysqli_error( $link));
mysqli_query( $link,"SET character_set_server= utf8")or die(mysqli_error( $link));
mysqli_query( $link,"SET character_set_results= utf8")or die(mysqli_error( $link));

if(!$link)
{
    echo "cannot link the database" .mysqli_error($link);
    exit();
}
$db_select = mysqli_select_db($link,"news");
if(!$db_select)
{
    echo "cannot link to the database ".mysqli_error($link);
    exit();
}
$sql = "DELETE FROM news_article_category WHERE id= '$id'";
$result = mysqli_query($link,$sql);
if($result)
{
    header("Location: cate.php");
}
?>