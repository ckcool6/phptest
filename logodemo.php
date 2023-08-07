<?php

logo('girl.jpg');
function logo($source,
              $logo = 'icon.png',
              $position = 8, $alpha = 30,
              $type = "jpeg",
              $path = 'test',
              $isRandName = true): void
{
    //open picture
    $sourceRes = open($source);
    $logoRes = open($logo);

    //get size and calculate position
    $sourceinfo = getimagesize($source);
    $logoinfo = getimagesize($logo);

    switch ($position) {
        case 1:
            $x = 0;
            $y = 0;
            break;
        case 2:
            $x = ($sourceinfo[0] - $logoinfo[0]) / 2;
            $y = 0;
            break;
        case 3:
            $x = $sourceinfo - $logoinfo;
            $y = 0;
            break;
        case 4:
            $x = 0;
            $y = ($sourceinfo[1] - $logoinfo[1]) / 2;
            break;
        case 5:
            $x = ($sourceinfo[0] - $logoinfo[0]) / 2;
            $y = ($sourceinfo[1] - $logoinfo[1]) / 2;
            break;
        case 6:
            $x = $sourceinfo[0] - $logoinfo[0];
            $y = ($sourceinfo[1] - $logoinfo[1]) / 2;
            break;
        case 7:
            $x = 0;
            $y = $sourceinfo[1] - $logoinfo[1];
            break;
        case 8:
            $x = ($sourceinfo[0] - $logoinfo[0]) / 2;
            $y = $sourceinfo[1] - $logoinfo[1];
            break;
        case 9:
            $x = $sourceinfo[0] - $logoinfo[0];
            $y = $sourceinfo[1] - $logoinfo[1];
            break;

        default:
            $x = mt_rand(0, $sourceinfo[0] - $logoinfo[0]);
            $y = mt_rand(0, $sourceinfo[1] - $logoinfo[1]);
            break;
    }

    //put together with two picture
    imagecopymerge($sourceRes,
        $logoRes,
        $x, $y, 0, 0,
        $logoinfo[0],
        $logoinfo[1],
        $alpha);

    $func = 'image' . $type;
    /*
    imagejpeg();
    imagepng();
    ...
     */

    //
    if ($isRandName) {
        $name = uniqid() . '.' . $type;
    } else {
        $pathinfo = pathinfo($source);
        $name = $pathinfo['filename'] . '.' . $type;
    }
    $path = rtrim($path, '/') . '/' . $name;
    $func($sourceRes, $path);

    imagedestroy($sourceRes);
    imagedestroy($logoRes);
}

/**
 * @param $path
 * @return false|GdImage|resource|void
 */
function open($path)
{
    if (!file_exists($path)) {
        exit('文件不存在');
    }

    $info = getimagesize($path);

    switch ($info['mime']) {
        case 'image/jpeg':
        case 'image/jpg':
        case 'image/pj peg':
            $res = imagecreatefromjpeg($path);
            break;

        case 'image/png':
            $res = imagecreatefrompng($path);
            break;

        case 'image/gif':
            $res = imagecreatefromgif($path);
            break;

        case 'image/wbmp':
        case 'image/bmp':
            $res = imagecreatefromwbmp($path);
            break;
    }

    return $res;
}

