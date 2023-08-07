<?php

//echo 'delete';

$id = $_GET['id'];

$link = mysqli_connect('127.0.0.1', 'root', '');

//var_dump($link);

if (!$link) {
    exit('数据库连接失败');
}

mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'bbs_db');
$sql = "delete from user where id=$id";
$boolean = mysqli_query($link, $sql);

if ($boolean && mysqli_affected_rows($link)) {
    echo '删除成功';

} else {
    echo '删除失败';

}

mysqli_close($link);