<?php

verify();
function verify($width = 100, $height = 40, $num = 5, $type = 1): string
{
    //创建画布
    $image = imagecreatetruecolor($width, $height);

    //生成字符
    $string = '';
    switch ($type) {
        case 1:
            $str = '0123456789';
            $string = substr(str_shuffle($str), 0, $num);
            break;
        case 2:
            $arr = range('a', 'z');
            shuffle($arr);
            $tmp = array_slice($arr, 0, $num);
            $string = join('', $tmp);
            break;
        case 3:
            $str = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = substr(str_shuffle($str), 0, $num);
            break;
    }

    //
    imagefilledrectangle($image,0,0,$width,$height,lightColor($image));

    //write to image area
    for ($i = 0; $i < $num; $i++) {
        $x = floor($width / $num) * $i;
        $y = mt_rand(10, $height - 20);
        imagechar($image, 5, $x, $y, $string[$i], deepColor($image));
    }

    //line shuffle
    for ($i = 0; $i < $num; $i++) {
        imagearc($image,
            mt_rand(10, $width),
            mt_rand(10, $height),
            mt_rand(10, $width),
            mt_rand(10, $height),
            mt_rand(0,10),
            mt_rand(0,270),
            deepColor($image));

    }

    //point shuffle
    for ($i = 0; $i < 50; $i++) {
        imagesetpixel($image,
        mt_rand(0,$width),
        mt_rand(0,$height),
        deepColor($image));
    }

    //
    header('Content-type:image/png');

    //
    imagepng($image);

    //
    imagedestroy($image);

    return $string;
}

function lightColor($image): bool|int
{
    return imagecolorallocate($image, mt_rand(130, 255), mt_rand(130, 255), mt_rand(130, 255));
}

function deepColor($image): bool|int
{
    return imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
}

