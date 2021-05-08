<?php
require_once '.././common/lib/MysqliDb.php';
$id = $_GET['id'];
$db = new MysqliDb('localhost','root','Gulnur#','news');
$arr_news = $db->where('id',$id)->get('news');
$row = $arr_news[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['title'];?></title>
</head>
<body>
<?php echo $row['content'];?>
</body>
</html>