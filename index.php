<?php

function slot_run() {
    $array = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $array[$i][$j] = rand(0, 1);
        }
    }
    return $array;
}

var_dump(slot_run());
?>