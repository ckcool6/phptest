<?php
$name = 'jack';

//echo $name;
////echo __FILE__;
$age = 22;
//echo $age;
//echo $age.'abc';
echo $name.$age;

##########################运算符############
echo '<table width="800" height="200" border="1">';

for ($i = 1; $i <= 9; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= $i; $j++) {
        echo '<td>' . $i . '*' . $j . '=' . $i * $j . '</td>';
    }
    echo '</tr>';
}

echo '</table>';

echo '<hr>';

