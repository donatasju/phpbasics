<?php
date_default_timezone_set('Europe/Vilnius');
$siukslines_turis = 40;
$dienos_siuksliu_turis = rand(10, 20);
$max_kaupo_turis = rand (1, 20);
$dienos = round(($siukslines_turis + $max_kaupo_turis) / $dienos_siuksliu_turis);
$date = date('Y.m.d', strtotime("+$dienos days"));
?>
<html>
    <head>
        <title>Uzduotis 4</title>
    </head>
    <body>
        <p>
            Po <?php print "$dienos($date)" ?> dienu pirk geliu ir sampano, jeigu nori, kad zmona siuskles pati isinestu.
        </p>
    </body>
</html>