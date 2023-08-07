<?php

$numbers = [2, 55, 86, 21];
var_dump($numbers);

$language = [
    '日本' => 'Japanese',
    '中国' => 'Chinese',
    '美国' => 'English'
];

var_dump($language);

echo '--------------------------------------';
echo '<br/>';
echo $numbers[1];

echo $language['日本'];

$arr = ['a', 'b', 'c'];
echo $arr[0];

echo '---------------------------------------';
echo '<br>';

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . '<br>';
}

echo '---------------------------------------';
echo '<br>';

foreach ($language as  $item) {
    echo $item  . '<br>';

}

