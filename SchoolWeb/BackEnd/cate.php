<?php
require_once  '../common/lib/authenticate.php';
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

$sql  = "select * from news_article_category";
$result = mysqli_query($link, $sql);
$arr_news_category = mysqli_fetch_all($result,MYSQLI_BOTH);
$sql = "INSERT IGNORE into news_article_category(NAME )VALUES ('$category')";
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
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">级分类</th>
      <th width="10%">操作</th>
    </tr>
      <?php
        foreach ($arr_news_category as $category_display) {
        ?>
    <tr>
      <td><?php echo $category_display['id'] ?></td>
      <td><?php echo $category_display['name'] ?></td>
      <td><div class="button-group"> <a class="button border-main" href="cate_edit.php?id=<?php echo $category_display['id'] ?>">  <span class="icon-edit"></span> 修改</a> <a class="button border-red" href="delete_cate.php?id=<?php echo $category_display['id'] ?>" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>
      <?php }?>

  </table>
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){

	}
}
</script>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
        <div class="label label_submit">
          <label>关键字标题：</label>
        </div>
        <div class="field">
            <div class="field">
                <input type="text" class="input w50" name="category" required="required" />
            </div>
            <div class="field_submit">
                <button class=" button bg-main icon-check-square-o" type="submit"> 提交</button>
            </div>
        </div>

    </form>
  </div>
</div>
</body>
</html>