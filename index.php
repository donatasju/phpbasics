<?php

function babuska_kvepia($kvepalu_kiekis_ml) {
    $atstumas_iki_babuskos = 1;
    if ($kvepalu_kiekis_ml > 1) {
        $kvepalu_kiekis_ml -= $kvepalu_kiekis_ml * 0.8;
        $atstumas_iki_babuskos += babuska_kvepia($kvepalu_kiekis_ml);
    }
    return $atstumas_iki_babuskos;
}

print babuska_kvepia(100);
?>