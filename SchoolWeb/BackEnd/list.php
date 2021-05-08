<?php
require_once  '../common/lib/authenticate.php';
include 'count_page.php';
require_once '../common/lib/MysqliDb.php';
$article_categories =[];
error_reporting(E_ALL&E_NOTICE);  //report the errors;
$db = new MysqliDb ('localhost', 'root', 'Gulnur#', 'news');
  $arr_news = $db->get("news");
  $arr_news_category = $db->get("news_article_category");
  //var_dump($arr_news[0]['pic']);
  foreach ($arr_news_category as $category )
  {
       $article_categories[$category['id']] = $category;
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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.php"> 添加内容</a> </li>
          <li> <a class="button border-main icon-plus-square-o" href="index.php">主页</a> </li>
          <!--        <li>搜索：</li>-->
<!--        <if condition="$iscid eq 1">-->
<!--        </if>-->
<!--        <li>-->
<!--          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />-->
<!--          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>-->
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
          <th>分类名</th>
          <th>标题</th>
          <th>关键字</th>
          <th>图片</th>
          <th>作者</th>
          <th width="10%">更新时间</th>
          <th width="310">操作</th>
      </tr>
        <?php
        foreach ($arr_news as $row)
        {
            ?>
        <tr>
            <td style="text-align:left; padding-left:20px;"><?php echo $row['id'] ?></td>
            <td width="10%"><?php echo $article_categories[$row['category_id']]['name'] ?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['tag']?></td>
            <td><img src="<?php echo $row['pic'] ?>" alt="Oops No Picture" width="70" height="50" /></td>
            <td><?php echo $row['author']?></td>
            <td><?php echo $row['created_time']?></td>
            <td><div class="button-group"> <a class="button border-main" href="edit.php?id=<?php echo $row['id'];?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="delete.php?id=<?php echo $row['id']?>" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>

        </tr>
        <?php
         }
        ?>
      <tr>
        <td colspan="8">
            <div class="pagelist">
                <a href="list.php">首页</a>
                <?php
                if( $page > 1 ){
                    ?>
                    <a href="list.php?page=<?php echo $pre_page;?>">上一页</a>
                    <?php
                }
                if( $page < $max_page ){
                    ?>
                    <a href="list.php?page=<?php echo $next_page;?>">下一页</a>
                    <?php
                }
                ?>
                <a href="list.php?page=<?php echo $max_page;?>">末页</a>
                /  总页码 <font color="red"><?php echo $max_page;?></font>页 当前页码 <font color="red"><?php echo $page;?></font>页
            </div>

        </td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})
//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}
//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}
//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}
//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o)
{
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}
</script>
</body>
</html>