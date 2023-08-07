<?php

session_start();

$_SESSION['username'] = 'abilly';
$_SESSION['password'] = '123';

session_destroy();

var_dump($_SESSION);