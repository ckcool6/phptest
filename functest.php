<?php

function name(): void
{
    echo '我是分页';
}

//name();

function info(string $name, int $age): int
{
    echo 'I am ' . $name . ' ' . $age;
    return 1;
}

info('Jack', '22');

function test(...$arr): void
{
    var_dump($arr);
}

test(1, 2, 3, 'a');

$noname = function () {
    echo 'sss';
};

$noname(); //匿名函数调用

############################

$num = rand(1, 255);
echo $num;

