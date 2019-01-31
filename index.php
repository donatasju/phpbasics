<?php

function slot_run($rows, $cols) {
    $array = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $array[$i][$j] = rand(0, 1);
        }
    }
    return $array;
}

function slot_check($array) {
    $winners = [];
    foreach ($array as $key => $value) {
        if (array_sum($value) == count($value)) {
            $winners[] = $key;
        }
    }
    return $winners;
}

$game = slot_run(3, 3);
var_dump(slot_check($game));
?>
