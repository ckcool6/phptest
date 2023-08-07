<?php

//var_dump($_GET);
var_dump($_POST);
//var_dump($_REQUEST);

###################
//var_dump($_SERVER);

$username = $_POST['username'];
$password = $_POST['password'];

$user = 'abilly';
$pass = '123q';

if ($username == $user && $password == $pass) {
    setcookie('username',$username,time()+60*60,'/');
    echo "已登录";
} else {
    echo "登录失败";
}
