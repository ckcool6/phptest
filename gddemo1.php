<?php

$img = imagecreatetruecolor(600, 600);

$red = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img,0,255,0);
$blue = imagecolorallocate($img,0,0,255);

imageline($img,0,0, 600, 600, $red);

header("Content-type:image/png");

imagepng($img);

imagedestroy($img);

