<?php

namespace igorw\conway;

use iter;

function alive_neighbours_count($world, $x, $y)
{
    $count = 0;

    for ($yn = $y-1; $yn <= $y+1; $yn++) {
        for ($xn = $x-1; $xn <= $x+1; $xn++) {
            if (isset($world[$yn][$xn]) && ($x !== $xn || $y !== $yn) && $world[$yn][$xn]) {
                $count++;
            }
        }
    }

    return $count;
}

function cell_generation($world, $x, $y)
{
    $neighbours = alive_neighbours_count($world, $x, $y);

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
