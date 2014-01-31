<?php

$width = 120;
$height = 50;

$world = [];

foreach (range(0, $height-1) as $y) {
    foreach (range(0, $width-1) as $x) {
        $world[$y][$x] = rand(0, 1);
    }
}

return $world;
