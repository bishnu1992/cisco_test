<?php
$image = imagecreatetruecolor(400, 300);

$col_1 = imagecolorallocate($image, 255, 255, 255);
$col_2 = imagecolorallocate($image, 255, 255, 255);
$col_3 = imagecolorallocate($image, 255, 255, 255);

imagepolygon($image, array(
       30, 20,   
       60, 20, 
        70,40, 
        60,60, 
        30, 60,
        20,40, 
    ),
    6,
    $col_1);

imagepolygon($image, array(
        30, 50,
        40, 60,
        50, 50,
        40, 40,
    ),
    4,
    $col_2);

imageellipse($image, 40, 50, 10, 10, $col_3);

header('Content-type: image/png');

imagepng($image);
imagedestroy($image);
?>