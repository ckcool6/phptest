<?php

//var_dump($_FILES);

if ($_FILES['file']['error']) {
    switch ($_FILES['file']['error']) {
        case 1:
            $str = '超出php.ini中的最大值';
            break;
        case 2:
            $str = '超出表单中设置的最大值';
            break;
        case 3:
            $str = '部分文件被上传';
            break;
        case 4:
            $str = '没有文件上传';
            break;
        case 6:
            $str = '找不到临时文件夹';
            break;
        case 7:
            $str = '文件写入失败';
            break;
    }
    echo $str;
    exit();
}

if ($_FILES['file']['size'] > (pow(1024, 2) * 2)) {
    exit('文件大小超出指定大小');
}

$allowMIME = ['image/png', 'image/jpeg', 'image/gif', 'image/wbmp'];
$allowType = ['png', 'jpeg', 'gif', 'wbmp'];

$pathinfo = pathinfo($_FILES['file']['name']);
$type = $pathinfo['extension'];

if (!in_array($type, $allowType)) {
    exit('不允许的文件后缀');
}

//
$path = 'upload/';

if (!file_exists($path)) {
    mkdir($path);
}
$name = uniqid() . '.' . $type;

//
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $path . $name)) {
        echo '上传成功';
    } else {
        echo '文件移动失败';
    }
} else {
    echo '不是上传文件';
    exit();
}
