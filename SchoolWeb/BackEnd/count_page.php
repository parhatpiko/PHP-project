<?php
/**
 * Created by PhpStorm.
 * User: HT
 * Date: 2017/9/3
 * Time: 1:13
 */


// 显示所有的错误
error_reporting(E_ALL & ~E_NOTICE  );
// 连接mysql数据库
$link = mysqli_connect('localhost','root', 'Gulnur#');
if (!$link) {
    echo "connect mysql error!";
    exit();
}
// 选中数据库 news为数据库的名字
$db_selected = mysqli_select_db($link, 'news');
if (!$db_selected) {
    echo "<br>selected db error!";
    exit();
}
// 设置mysql字符集 为 utf8
$link->query("set names utf8");

// 查询新闻表中的数据
$sql = "select * from news where 1 "; // 查询语句
$sql_count =  "select count(*) as amount from news where 1 "; // 统计总记录数
$sql .= "order by id asc";

// 获取总记录条数
$result_amount = mysqli_query($link, $sql_count);

$arr_amount = mysqli_fetch_all($result_amount);

// 总记录条数
$amount = $arr_amount['amount'];

// 每页的记录条数
$page_size = 4;
// 总页码
$max_page = ceil( $amount / $page_size );

// 获取当前页码
$page = intval($_GET['page']); // 获取page值，并转成int
if( $page <= 0 || $page > $max_page){  // 如果page值小于0，或是大于最大页码
    $page = 1;
}
// 上一页
$pre_page = $page -1;
if( $pre_page < 1 ){ // 如果上一页小于1
    $pre_page = 1;
}

// 下一页
$next_page = $page + 1;
if( $next_page > $max_page ){ // 如果下一页大于最大页码
    $next_page = $max_page;
}
// 分页计算， 计算分页的offset
$offset = ($page - 1 ) * $page_size;
$sql .= " limit $offset, $page_size ";


?>