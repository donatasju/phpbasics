<?php

function slot_run() {
    for ($i = 0; $i < 3; $i++) {
        $random_skaicius = rand(0, 1);
        $array[] = $random_skaicius;
    }
    for ($i = 0; $i < 3; $i++) {
        $array_3_skaiciu[] = $array;
    }
    return $array_3_skaiciu;
}

var_dump(slot_run());
