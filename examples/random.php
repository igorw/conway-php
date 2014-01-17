<?php

$width = 120;
$height = 50;

$world = [];

foreach (range(0, $height) as $y) {
    foreach (range(0, $width) as $x) {
        $world[$y][$x] = rand(0, 1);
    }
}

return $world;
