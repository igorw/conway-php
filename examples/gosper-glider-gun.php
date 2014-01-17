<?php

$world = <<<EOF

                         x
                       x x
             xx      xx            xx
            x   x    xx            xx
 xx        x     x   xx
 xx        x   x xx    x x
           x     x       x
            x   x
             xx

EOF;

$parse_cell = function ($cell) {
    return 'x' === $cell ? 1 : 0;
};

$parse = function ($world) use ($parse_cell) {
    $result = [];
    foreach (explode("\n", $world) as $row) {
        $result[] = array_map($parse_cell, str_split($row));
    }
    return $result;
};

return $parse($world);
