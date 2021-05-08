<?php
require_once  '../common/lib/authenticate.php';
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/4
 * Time: 2:15
 */
$id="";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
$category ="";
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
if(isset($_POST['category']))
{
    $category = $_POST['category'];
}

$sql  = "select * from news_article_category WHERE id = '$id'";
$result = mysqli_query($link, $sql);
$arr_news_category = mysqli_fetch_all($result,MYSQLI_BOTH);
if(isset($arr_news_category))
{
    $category_display = $arr_news_category[0];
}
$sql = "update news_article_category set NAME = '$category' WHERE id = '$id'";

if(!empty($_POST))
{
    $result = mysqli_query($link,$sql);
    if($result)
    {
        header("Location: cate.php");

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
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改分类</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <div class="label label_submit">
                <label>关键字标题：</label>
            </div>
            <div class="field">
                <input type="text" value="<?php echo $category_display['name'] ?>"class="input w50" name="category" />
            </div>
            <div class="field_submit">
                <button class="center_submit button bg-main icon-check-square-o" type="submit"> 提交</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
