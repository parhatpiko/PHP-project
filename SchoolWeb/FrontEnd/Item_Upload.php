<?php

//上传库只是一个帮手，上产路径是要根据，其被引用的，即运行文件所在的目录结构；
session_save_path('D:/IDE/PHPServer/php7/session');
session_start();
header("Content-Type: text/html; charset=utf-8");

global $pdf_path;
global $item;
$str_pdf_path="";
$str_pdf_name="";
$str_ppt_path="";
$str_ppt_name="";
$str_zip_path="";
$str_zip_name="";
global $upload_flag;
$upload_flag="";
require_once '.././common/lib/upload_manager.php';
require_once '.././common/lib/MysqliDb.php';

//get Mysqli manipulation object;
$db = new  MysqliDb('localhost','root','Gulnur#','news');



//Here we need to information first code,and the upload flag,Only when code is correct and
//flag is true that can they upload item;

// get specific code column
$code_col=[
  'veri_code'
];
// get specific flag column
$pdf_flag_col=[
  'pdf_flag'
];
$ppt_flag_col=[
    'ppt_flag'
];
$zip_flag_col=[
    'zip_flag'
];
// updatea falg value when upload pdf file successfully
$pdf_flag_update=[
    'pdf_flag'=>'2'
];
$ppt_flag_update=[
    'ppt_flag'=>'2'
];
$zip_flag_update=[
    'zip_flag'=>'2'
];

$get_team_code = $db->get('team',null,$code_col);
    foreach ($get_team_code as $item)
    {
        //first need to upload
        if(isset($_POST['pdf']))
        {
            echo "<script>alert('进入pdf')</script>";
            //only when code is correct
            if($_POST['code']== $item['veri_code'])
            {
                $get_pdf_flag = $db->where('veri_code',$_POST['code'])->get('team',null,$pdf_flag_col);
                // Have not uploaded file before
                if( $get_pdf_flag[0]['pdf_flag']== '1')
                {
                    $upload_flag =1;
                    break;
                }
                else if($get_pdf_flag[0]['pdf_flag']== '2')
                {
                    echo "<script>alert('已上传过')</script>";
                    echo "<script>window.close();</script>";
                    break;
                }
            }
        }
         if(isset($_POST['ppt']))
        {
              //only when code is correct
            if($_POST['code']== $item['veri_code'])
            {
                $get_ppt_flag = $db->where('veri_code',$_POST['code'])->get('team',null,$ppt_flag_col);
                // Have not uploaded file before
                if( $get_ppt_flag[0]['ppt_flag']== '1') {
                    $upload_flag =1;
                    break;
                }
                else if($get_ppt_flag[0]['ppt_flag']== '2')
                {
                    echo "<script>alert('已上传过')</script>";
                    echo "<script>window.close();</script>";
                    break;
                }
            }
        }
        if(isset($_POST['zip']))
        {

            //only when code is correct
            if($_POST['code']== $item['veri_code'])
            {
                $get_zip_flag = $db->where('veri_code',$_POST['code'])->get('team',null,$zip_flag_col);
                // Have not uploaded file before
                if( $get_zip_flag[0]['zip_flag']== '1')
                {
                    $upload_flag =1;
                    break;
                }
                else if($get_zip_flag[0]['zip_flag']== '2')
                {
                    echo "<script>alert('已上传过')</script>";
                    echo "<script>window.close();</script>";
                    break;
                }
            }
        }
    }

// Now that out of foreach iterate and code is not exist
if($_POST&&($_POST['code']!= $item['veri_code']))
{
    echo "<script>alert('凭证错误')</script>";
}

// upload pdf file
//code is a link that mapping team_info and pdf file info;
if($_FILES['myfile_pdf']&&($upload_flag==1))  //to test whether post data
{
    //get pdf path
    //get upload pdf object;
    $pdf_path = new get_pdf_path();
    $pdf_path->move_pdf();
    if($pdf_path->getPdfPath())
    {
        $str_pdf_path = $pdf_path->getPdfPath();
    }
   // get pdf name
    if($pdf_path->getPdfName())
    {
        $str_pdf_name = $pdf_path->getPdfName();
    }
    $data_pdf_info=[
        'filename'=>$str_pdf_name,
        'filepath'=>$str_pdf_path,
        'veri_code'=>$_POST['code']
    ];
    $result_move_pdf = $db->insert('item_pdf',$data_pdf_info);
    if($result_move_pdf)
    {
        $result=$db->where('veri_code',$_POST['code'])->update("team",$pdf_flag_update);
        echo "<script>alert('提交成功');</script>";
        echo "<script>window.close();</script>";
        echo "<script>window.open(index.php);</script>";
    }

}

// upload ppt file
if($_FILES['myfile_ppt']&&($upload_flag==1))  //to test whether post data
{
    //get pdf path
    //get upload pdf object;
    $ppt_path = new get_ppt_path();
    $ppt_path->move_ppt();
    if($ppt_path->getpptPath())
    {
        $str_ppt_path = $ppt_path->getpptPath();
    }
    // get pdf name
    if($ppt_path->getpptName())
    {
        $str_ppt_name = $ppt_path->getpptName();
    }
    $data_ppt_info=[
        'filename'=>$str_ppt_name,
        'filepath'=>$str_ppt_path,
        'veri_code'=>$_POST['code']
    ];
    $result_move_ppt = $db->insert('item_ppt',$data_ppt_info);
    if($result_move_ppt)
    {
        $result=$db->where('veri_code',$_POST['code'])->update("team",$ppt_flag_update);
        echo "<script>alert('提交成功');</script>";
        echo "<script>window.close();</script>";
        echo "<script>window.open(index.php);</script>";
    }
}


// upload zip file
//code is a link that mapping team_info and pdf file info;
if($_FILES['myfile_zip']&&($upload_flag==1))  //to test whether post data
{
    //get pdf path
    //get upload pdf object;
    $zip_path = new get_zip_path();
    $zip_path->move_zip();
    if($zip_path->getzipPath())
    {
        $str_zip_path = $zip_path->getzipPath();
    }
    // get pdf name
    if($zip_path->getzipName())
    {
        $str_zip_name = $zip_path->getzipName();
    }
    $data_pdf_info=[
        'filename'=>$str_zip_name,
        'filepath'=>$str_zip_path,
        'veri_code'=>$_POST['code']
    ];

    $result_move_zip = $db->insert('item_zip',$data_pdf_info);
    if($result_move_zip)
    {
        $result=$db->where('veri_code',$_POST['code'])->update("team",$zip_flag_update);
        echo "<script>alert('提交成功');</script>";
        echo "<script>window.close();</script>";
        echo "<script>window.open(index.php);</script>";
    }
    else{
        echo "<script>alert('失败');</script>";
    }

}




?>
<!DOCTYPE html>
<!-- release v4.3.6, copyright 2014 - 2017 Kartik Visweswaran -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>项目上传中心</title>
    <link href="../BackEnd/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../BackEnd/KingUpload/css/default.css">
    <link href="../BackEnd/KingUpload/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
   <script src="../BackEnd/js/jquery.min.js" type="text/javascript"></script>
   <script src="../BackEnd/KingUpload/js/fileinput.js" type="text/javascript"></script>
    <script src="../BackEnd/js/bootstrap.min.js"></script>
</head>
<body>
<div class="htmleaf-container">
    <div class="container kv-main">
        <form enctype="multipart/form-data"  method="post" action="Item_Upload.php">
            <div class="form-group">
                <input name="code" placeholder="输入凭证" required="required">
                <input type="file" name="myfile_pdf" class="file" required="required">
            </div>
            <hr>
            <div class="form-group">
                <button class="btn btn-warning" type="button">Disable Test</button>
                <button class="btn btn-info" type="reset">Refresh Test</button>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-default" type="reset">Reset</button>
            </div>
            <input type="hidden" name="pdf" value="123">
        </form>

        <form enctype="multipart/form-data" method="post" action="Item_Upload.php">
            <div class="form-group">
                <input name="code" placeholder="输入凭证" required="required">
                <input type="file" name="myfile_ppt" class="file" required="required">
            </div>
            <hr>
            <div class="form-group">
                <button class="btn btn-warning" type="button">Disable Test</button>
                <button class="btn btn-info" type="reset">Refresh Test</button>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-default" type="reset">Reset</button>
            </div>
            <input type="hidden" name="ppt" value="123">
        </form>
        <form enctype="multipart/form-data" method="post" action="Item_Upload.php">

            <div class="form-group">
                <input name="code" placeholder="输入凭证(大小<=200M)" required="required">
                <input type="file" name="myfile_zip"  class="file" required="required">
            </div>
            <hr>
            <div class="form-group">
                <button class="btn btn-warning" type="button">Disable Test</button>
                <button class="btn btn-info" type="reset">Refresh Test</button>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-default" type="reset">Reset</button>
            </div>
            <input type="hidden" name="zip" value="123">
        </form>
    </div>
</div>

</body>

<script>

    $("#file-1").f ileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });

    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function() {
        if ($('#file-4').attr('disabled')) {
            $('#file-4').fileinput('enable');
        } else {
            $('#file-4').fileinput('disable');
        }
    });
    $(".btn-info").on('click', function() {
        $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
    });
        $(document).ready(function() {
        $("#test-upload").fileinput({
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock'
        });
    });
</script>

</html>