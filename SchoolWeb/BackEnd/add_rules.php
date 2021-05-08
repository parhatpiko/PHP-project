<?php
require_once  '../common/lib/authenticate.php';
global $id;
$id="";
if($_GET)
{
    $id = $_GET['id'];
}
//var_dump($id);
require_once "../common/lib/MysqliDb.php";

$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
error_reporting(E_ALL&E_NOTICE);  //report the errors;
 $row="";
 $db->where('category_id',$id);
 $arr_rules = $db->get('rules');
 if($arr_rules)
 {
     $row=$arr_rules[0];
 }
if(!empty($_POST))
{
$data_rules=[
    "content"=>$_POST['content'],
    "tag"=>$_POST['tag']
];
    $result=$db->where('id',$_POST['id'])->update("rules",$data_rules);
    if($result)
    {
        echo "<script>alert('修改成功')</script>";
        header("Location:index.php");
    }
    else{
        echo "<script>alert('修改失败')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<title>规则须知</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<script src="js/preview.js" type="text/javascript"></script>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="ueditor/ueditor.all.js"></script>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $("#category_id").change(function(){-->
<!--            $.get("getrules.php?id="+showCustomer(),function (data, status) {-->
<!--                document.getElementById("content").innerHTML=data;-->
<!--            })-->
<!--        });-->
<!--    });-->
<!--    function showCustomer() {-->
<!--        var str = document.getElementById("category_id").value;-->
<!--        return str;-->
<!--    }-->
<!--</script>-->

<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="add_rules.php" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>分类：</label>
        </div>
        <select name="category_id" id="category_id" style="padding:5px 15px ; border:1px solid #ddd;" required="required">
            <option value="1"  <?php if($id==1){?> selected <?php }?>>报名须知</option>
            <option value="2" <?php if($id==2){?> selected <?php }?>>竞赛规则</option>
            <option value="3"  <?php if($id==3){?> selected <?php }?>>首页-左</option>
            <option value="4" <?php if($id==4){?> selected <?php }?>>首页-右</option>
        </select>
      </div>
      <div class="form-group">
        <div class="label">
            <label>内容：</label>
        </div>
        <div class="field">
            <script id="container" name="content" id="content" type="text/plain"><?php echo $row['content'] ?></script>
            <script type="text/javascript">
                var ue = UE.getEditor('container',{ initialFrameHeight:500});
            </script>
        </div>
      </div>
      <?php
      if($id==3||$id==4) {
          ?>
          <div class="form-group">
              <div class="label">
                  <label>关键字：</label>
              </div>
              <div class="field">
                  <input type="text" class="input" name="tag" value="<?php echo $row['tag'] ?>" required="required"/>
              </div>
          </div>
          <?php
      }
      ?>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>