<?php

//echo time();
date_default_timezone_set('PRC');
$time = time();
echo date('Y-m-d H:i:s', $time);

//

//连接数据库
$link = mysqli_connect('127.0.0.1', 'root', '');

//var_dump($link);

if (!$link) {
    exit('数据库连接失败');
}

mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'bbs_db');
$sql = "select * from user";
$obj = mysqli_query($link, $sql);

//var_dump($res);

//$res = mysqli_fetch_assoc($obj);
//var_dump($res);

/*while ($rows = mysqli_fetch_assoc($obj)){
    var_dump($rows);
}*/

echo '<table width="600" border="1">';
echo '<th>编号</th><th>姓名</th><th>密码</th><th>年龄</th><th>操作</th>';
while ($rows = mysqli_fetch_assoc($obj)) {
    echo '<tr>';

    echo '<td>' . $rows['id'] . '</td>';
    echo '<td>' . $rows['username'] . '</td>';
    echo '<td>' . $rows['password'] . '</td>';
    echo '<td>' . $rows['age'] . '</td>';
    echo '<td><a href="delete.php?id='.$rows['id'].'">删除</a>/<a href="update.php?id='.$rows['id'].'">修改</a></td>';

    echo '</tr>';
}
echo '</table>';

mysqli_close($link);