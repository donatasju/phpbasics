<?php

function drink_beer($kiekis) {
    
    $gurksniu_kiekis = 0;
    $gurksnio_dydis = $kiekis / 10;
    
    if ($gurksnio_dydis < 20) {
        $gurksnio_dydis = 20;
    }

    if ($kiekis < 20) {
        $kiekis = $gurksnio_dydis;
    }

    $kiekis -= $gurksnio_dydis;
    $gurksniu_kiekis++;

    if ($kiekis > 0) {
        $gurksniu_kiekis += drink_beer($kiekis);
    }

    return $gurksniu_kiekis;
}

print drink_beer(500);
?>