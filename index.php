<?php
$siukslines_turis = 40;
$dienos_siuksliu_turis = rand(10,20);
$max_kaupo_turis = rand(10,20);
$diena = floor(($siukslines_turis + $max_kaupo_turis) / $dienos_siuksliu_turis);
$data = date('Y-m-d', strtotime("+$diena day"));
?>
<html>
    <body>
        <p>
            Po <?php print "$diena ($data)" ?> pirk geliu ir sampona, jeigu nori, 
            kad zmona siuksles pati isnestu.
        </p>
    </body>
</html>