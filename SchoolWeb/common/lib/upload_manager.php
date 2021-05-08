<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/8
 * Time: 19:26
 */

class  get_pic_path{
    private  $avatar_path ="";
    private  $flag ="";

    function __construct($flag)
    {
        $this->flag = $flag;
    }

    public  function get_picpath()
    {
        $avatar_path=$this->avatar_path;
        if(count($_FILES) > 0)
        {
            // 检查文件类型
            if(  !in_array($_FILES['pic']['type'], array('image/jpeg','image/png', 'image/gif')) ){
                echo "<script>alert('只运行上传jpg或png图片， 文件类型不合法，不允许上传')</script>";
                echo "<script>window.close()</script>";
                exit();
            }
            // 检查文件大小
            if ($_FILES['pic']['size'] > 5*1024*1024){
                echo "文件最大尺寸为5M，不允许上传.";
            }
            $file_ext= pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION); // 获取文件后缀名
            $tmp_file = $_FILES['pic']['tmp_name']; // 临时文件
//     var_dump($tmp_file);
            $dest_file = pathinfo($tmp_file, PATHINFO_FILENAME).".".$file_ext; // 保存的文件名
            //move_uploaded_file($tmp_file, "d:/wamp/www/upload/".$dest_file);  // 使用绝对地址保存图片
            // FontEnd Upload Pic
            if($this->flag==0)
            {
                move_uploaded_file($tmp_file, ".././BackEnd/upload/team_pic/".$dest_file); // 使用相对路径地址保存图片
                if (isset($avatar_path))
                {
                    $avatar_path =".././BackEnd/upload/team_pic/".$dest_file; // 注意，保存的时候，设置从服务器的根目录开始
//        var_dump($avatar_path);
                }
            }
            // BackEnd Upload pics
            else
            {
                move_uploaded_file($tmp_file, "upload/tag_image/".$dest_file); // 使用相对路径地址保存图片
                if (isset($avatar_path))
                {
                    $avatar_path ="upload/tag_image/".$dest_file; // 注意，保存的时候，设置从服务器的根目录开始
//
                }

            }
            return $avatar_path;
        }
    }
}

class get_pdf_path{
    private $pdf_path ="";
    private $pdf_name="";

    public function move_pdf()
    {
         $pdf_path="";
         $move_file_result="";
        if($_FILES)
        {
            if ($_FILES['myfile_pdf']['type'] != "application/pdf")
            {
                echo '<script type="text/javascript">alert("请选择PDF格式文档");</script>';
                echo "<script>window.close()</script>";
//                echo "<script>window.open('http://localhost/SchoolWeb/FrontEnd/Item_Upload.php')</script>"
                exit();
            }
            else
            {
                //upload file
//             $file_ext= pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION); // 获取文件后缀名
                $file_name = $_FILES['myfile_pdf']['name'];
                $this->pdf_name = $file_name;
//             var_dump($_FILES['myfile']['name']);
//             var_dump($file_ext);
                $tmp_file = $_FILES['myfile_pdf']['tmp_name']; // 临时文件
                //可选方法 这样有点是文件名会大大缩小
//             $dest_file_name = pathinfo($tmp_file, PATHINFO_FILENAME).".".$file_ext; // 保存的文件名
                $pdf_path=".././BackEnd/upload/item_pdf/"."_".time().$file_name;
                //iconv 很明显是一个编码转换函数非常有用
                $move_file_result=move_uploaded_file($tmp_file, iconv("UTF-8","gbk",$pdf_path)); // 使用绝对路径地址保存图
            }
        }
        if($move_file_result)
        {
            $this->pdf_path = $pdf_path;
        }
        else
        {
            $this->pdf_path = "Cannot move pdf";
            echo "<script>alert('Cannot move Pdf')</script>";
        }


    }

    /**
     * @return string
     */
    public function getPdfName(): string
    {
        return $this->pdf_name;
    }

    /**
     * @return string
     */
    public function getPdfPath(): string
    {
        return $this->pdf_path;
    }
}

class get_ppt_path{
    private $ppt_path ="";
    private $ppt_name="";

    public function move_ppt()
    {
        $ppt_path="";
        $move_file_result="";
        if($_FILES)
        {
            if (($_FILES['myfile_ppt']['type'] != "application/vnd.ms-powerpoint"))
            {
                echo '<script type="text/javascript">alert("请选择PPT格式文档");</script>';
                echo "<script>window.close()</script>";
//                echo "<script>window.open('http://localhost/SchoolWeb/FrontEnd/Item_Upload.php')</script>"
                exit();
            }
            else
            {
                //upload file
//             $file_ext= pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION); // 获取文件后缀名
                $file_name = $_FILES['myfile_ppt']['name'];
                $this->ppt_name = $file_name;
//             var_dump($_FILES['myfile']['name']);
//             var_dump($file_ext);
                $tmp_file = $_FILES['myfile_ppt']['tmp_name']; // 临时文件
                //可选方法 这样有点是文件名会大大缩小
//             $dest_file_name = pathinfo($tmp_file, PATHINFO_FILENAME).".".$file_ext; // 保存的文件名
                $ppt_path=".././BackEnd/upload/item_ppt/"."_".time().$file_name;
                //iconv 很明显是一个编码转换函数非常有用
                $move_file_result=move_uploaded_file($tmp_file, iconv("UTF-8","gbk",$ppt_path)); // 使用绝对路径地址保存图
            }
        }
        if($move_file_result)
        {
            $this->ppt_path = $ppt_path;
        }
        else
        {
            $this->ppt_path = "Cannot move ppt";
            echo "<script>alert('Cannot move ppt')</script>";
        }


    }

    /**
     * @return string
     */
    public function getpptName(): string
    {
        return $this->ppt_name;
    }

    /**
     * @return string
     */
    public function getpptPath(): string
    {
        return $this->ppt_path;
    }
}
class get_zip_path{
    private $zip_path ="";
    private $zip_name="";

    public function move_zip()
    {
        $zip_path="";
        $move_file_result="";
        $okay="";
        if($_FILES)
        {
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            foreach($accepted_types as $mime_type)
            {
                if($mime_type == $_FILES['myfile_zip']['type']) {
                    $okay = true;
                    break;
                }
            }
            if (!$okay)
            {
                echo '<script type="text/javascript">alert("请选择ZIP格式文档");</script>';
                echo "<script>window.close()</script>";
//                echo "<script>window.open('http://localhost/SchoolWeb/FrontEnd/Item_Upload.php')</script>"
                exit();
            }
            else
            {
                //upload file
//             $file_ext= pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION); // 获取文件后缀名
                $file_name = $_FILES['myfile_zip']['name'];
                $this->zip_name = $file_name;
//             var_dump($_FILES['myfile']['name']);
//             var_dump($file_ext);
                $tmp_file = $_FILES['myfile_zip']['tmp_name']; // 临时文件
                //可选方法 这样有点是文件名会大大缩小
//             $dest_file_name = pathinfo($tmp_file, PATHINFO_FILENAME).".".$file_ext; // 保存的文件名
                $zip_path=".././BackEnd/upload/item_zip/"."_".time().$file_name;
                //iconv 很明显是一个编码转换函数非常有用
                $move_file_result=move_uploaded_file($tmp_file, iconv("UTF-8","gbk",$zip_path)); // 使用绝对路径地址保存图
            }
        }
        if($move_file_result)
        {
            $this->zip_path = $zip_path;
        }
        else
        {
            $this->zip_path = "Cannot move pdf";
            echo "<script>alert('Cannot move Pdf')</script>";
        }


    }

    /**
     * @return string
     */
    public function getzipName(): string
    {
        return $this->zip_name;
    }

    /**
     * @return string
     */
    public function getzipPath(): string
    {
        return $this->zip_path;
    }
}
?>