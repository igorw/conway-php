<?php

namespace igorw\conway;

use iter;

function alive_neighbours($world, $x, $y)
{
    $i = 0;

    for ($yn = $y-1; $yn <= $y+1; $yn++) {
        for ($xn = $x-1; $xn <= $x+1; $xn++) {
            if (isset($world[$yn][$xn]) && [$x, $y] !== [$xn, $yn] && $world[$yn][$xn]) {
                $i++;
            }
        }
    }

    return $i;
}

function cell_generation($world, $x, $y)
{
    $neighbours = alive_neighbours($world, $x, $y);

    return 3 === $neighbours || ($world[$y][$x] && $neighbours === 2);
}

function tick($world)
{
    $new_world = [];

    foreach ($world as $y => $row) {
        foreach ($row as $x => $cell) {
            $new_world[$y][$x] = cell_generation($world, $x, $y);
        }
    }

    return $new_world;
}

function run($world, $n = 1)
{
    for ($i = 0; $i < $n - 1; $i++) {
        $world = tick($world);
        yield $i => $world;
    }
}

function result($results)
{
    foreach ($results as $result);

    return $result;
}

function format_world($world)
{
    foreach ($world as $row) {
        foreach ($row as $cell) {
            yield $cell ? 'x' : ' ';
        }
        yield "\n";
    }
}

function print_world($world)
{
    echo implode('', iter\toArray(format_world($world)));
}
