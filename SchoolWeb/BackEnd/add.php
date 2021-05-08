<?php
require_once '../common/lib/MysqliDb.php';
require_once '../common/lib/upload_manager.php';
require_once  '../common/lib/authenticate.php';
session_save_path('D:/IDE/PHPServer/php7/session');
//session_start();

global $avatar_path;
$avatar_path="";

$db = new MysqliDb('localhost','root','Gulnur#','news');
$pic_path = new get_pic_path('1');
$avatar_path = $pic_path->get_picpath();

//// Handling uploading pictures
//if(count($_FILES) > 0)
//{
//    // 检查文件类型
//    if(  !in_array($_FILES['pic']['type'], array('image/jpeg','image/png', 'image/gif')) ){
//        echo "只运行上传jpg或png图片， 文件类型不合法，不允许上传";
//    }
//    // 检查文件大小
//    if ($_FILES['pic']['size'] > 5*1024*1024){
//        echo "文件最大尺寸为5M，不允许上传.";
//    }
//    $file_ext= pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION); // 获取文件后缀名
//    $tmp_file = $_FILES['pic']['tmp_name']; // 临时文件
////     var_dump($tmp_file);
//    $dest_file = pathinfo($tmp_file, PATHINFO_FILENAME).".".$file_ext; // 保存的文件名
//    //move_uploaded_file($tmp_file, "d:/wamp/www/upload/".$dest_file);  // 使用绝对地址保存图片
//    move_uploaded_file($tmp_file, "upload/tag_image/".$dest_file); // 使用绝对路径地址保存图片
//    if (isset($avatar_path))
//    {
//        $avatar_path ="upload/tag_image/".$dest_file; // 注意，保存的时候，设置从服务器的根目录开始
//    }
//}

$arr_news_category= $db->get('news_article_category');

if($_POST)
{
    $data_news=[
        "category_id"=>$_POST['category_id'],
        "title"=>$_POST['title'],
        "content"=>$_POST['content'],
        "tag"=>$_POST['tag'],
        "author"=>$_POST['author'],
        "pic"=>$avatar_path,
        "created_time"=>date("Y-m-d H:i:s")

    ];
    var_dump($data_news);
    $result = $db->insert("news",$data_news);
    if(!$result)
    {
        echo "<script>alert('添加新闻失败！不能提交空白表单')</script>";
        exit();
    }
    else{
        echo "<script>alert('添加新闻成功！')</script>";
        header("Location:list.php");
    }
}
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
 <script src="js/preview.js" type="text/javascript"></script>
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="add.php" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>分类：</label>
        </div>
        <select name="category_id" style="padding:5px 15px ; border:1px solid #ddd;" required="required">
            <option>请选择</option>
            <?php foreach($arr_news_category as $category){?>
                <option value="<?php echo $category['id'];?>" ><?php echo $category['name'];?></option>
            <?php }?>
        </select>
      </div>
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" required="required" /><div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>关键字：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="tag" value="" required="required"/>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
            <label>内容：</label>
        </div>
        <div class="field">
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain"></script>
            <!-- 配置文件 -->
            <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
            <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container',{ initialFrameHeight:300});
            </script>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="author" value="" required="required" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="file" id="url1"  name="pic" class="input tips" style="width:25%; float:left;"  onchange="loadFile(event)"  required="required" />
          <div class="tipss"> <img id="output" width="100" height="100" src="<?php echo row['pic'] ?>"> </div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>