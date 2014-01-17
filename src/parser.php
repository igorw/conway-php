<?php

namespace igorw\conway;

function parse_cell($cell) {
    return 'x' === $cell ? 1 : 0;
};

function parse($world) {
    $result = [];
    foreach (explode("\n", $world) as $row) {
        $result[] = array_map('igorw\conway\parse_cell', str_split($row));
    }
    return $result;
};
