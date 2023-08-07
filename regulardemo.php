<?php

$pattern = '/(http|https)?:\/\/(\w+.?)(\w+.?)(\w+.?)/';

$str = 'https://www.baidu.com';

if (preg_match($pattern,$str,$matches)){
    echo '匹配成功';
    var_dump($matches);

} else {
    echo '匹配失败';
}

