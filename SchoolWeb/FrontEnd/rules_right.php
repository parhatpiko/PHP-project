<?php
require_once '.././common/lib/MysqliDb.php';
$id = $_GET['id'];
$db = new MysqliDb('localhost','root','Gulnur#','news');
$arr_rules = $db->where('category_id',4)->get('rules');
$row = $arr_rules[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>规则</title>
</head>
<body>
<?php echo $row['content'];?>
</body>
</html>