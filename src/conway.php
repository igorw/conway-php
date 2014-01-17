<?php

namespace igorw\conway;

use iter;

function neighbours($world, $x, $y)
{
    for ($yn = $y-1; $yn <= $y+1; $yn++) {
        for ($xn = $x-1; $xn <= $x+1; $xn++) {
            if (isset($world[$yn][$xn]) && [$x, $y] !== [$xn, $yn]) {
                yield [$xn, $yn];
            }
        }
    }
}

function alive_neighbours($world, $x, $y)
{
    $cell_value = function ($cell) use ($world) {
        list($x, $y) = $cell;
        return $world[$y][$x];
    };

    return iter\filter($cell_value, neighbours($world, $x, $y));
}

function cell_generation($world, $x, $y)
{
    $value = $world[$y][$x];
    $neighbours = iter\count(alive_neighbours($world, $x, $y));

    if ($value) {
        return in_array($neighbours, [2, 3]);
    }

    return 3 === $neighbours;
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
    foreach (iter\range(0, $n-1) as $i) {
        $world = tick($world);
        yield $i => $world;
    }
}

function result($results)
{
    foreach ($results as $result);

    return $result;
}

function format_wold($world)
{
    foreach ($world as $y => $row) {
        foreach ($row as $x => $cell) {
            yield $cell ? 'x' : ' ';
        }
        yield "\n";
    }
}

function print_world($world)
{
    echo implode('', iter\toArray(format_wold($world)));
}
