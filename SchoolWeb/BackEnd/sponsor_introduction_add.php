<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/13
 * Time: 17:49
 */
global $avatar_path;
$avatar_path="";
require_once '../common/lib/authenticate.php';
require_once '../common/lib/MysqliDb.php';
require_once '../common/lib/upload_manager.php';


$db = new MysqliDb('localhost','root','Gulnur#','news');
$pic_path = new get_pic_path('1');
$avatar_path = $pic_path->get_picpath();

if($_POST)
{
    $data_speciallist=[
        'sponsor_name'=>$_POST['sponsor_name'],
        'sponsor_url'=>$_POST['sponsor_url'],
        'sponsor_pic'=>$avatar_path,
        'sponsor_introduction'=>$_POST['sponsor_introduction'],
        'created_time'=>date("Y-m-d H:i:s")
    ];
    $result_data_sponsor = $db->insert('sponsor',$data_speciallist);
    if($result_data_sponsor)
    {
        echo "<script>alert('添加成功')</script>";
        header("Location: sponsor_display.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>专家信息添加</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/register.css">
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/register.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="col-md-6">
      <div class="row">
          <form method="post" enctype="multipart/form-data" action="sponsor_introduction_add.php">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>名称</label>
                            <input type="text" name="sponsor_name" placeholder="专家姓名" class="form-control"required="required">
                        </div>
                    </div>
                </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label>URL</label>
                          <input type="text" name="sponsor_url" placeholder="URL" class="form-control"required="required">
                      </div>
                  </div>
              </div>
                <div class="form-group">
                    <label>选择一个队图</label>
                    <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-default btn-file">
                          浏览… <input type="file"id="imgInp" name="pic">
                      </span>
                  </span>
                        <input type="text" class="form-control" name="" readonly required="required">
                    </div>
                    <img id='img-upload'/>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="comment">简要介绍</label>
                            <textarea class="form-control" name="sponsor_introduction" rows="5" id="comment" required="required"></textarea>
                        </div>
                    </div>
                </div>
              <button type="submit" class="btn btn-lg btn-info">Submit</button>
          </form>
      </div>
    </div>

</div>
</body>
</html>
