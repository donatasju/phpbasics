<?php
$days = 365;
$pakelio_kaina = 3.50;
$cigaretes_kaina = $pakelio_kaina / 20;
$surukytos_cigaretes = 0;
$ket_penk_cigaretes = 0;

for ($i = 0; $i < $days; $i++) {
    $cizos_mon_thu = rand(3, 4);
    $cizos_fri = rand(10, 20);
    $cizos_sat_sun = rand(1, 3);
    $savaites_diena = date('N', strtotime("+$i day"));
    if ($savaites_diena >= 1 && $savaites_diena <= 4) {
        $surukytos_cigaretes += $cizos_mon_thu;
        $ket_penk_cigaretes += $cizos_mon_thu;
    } elseif ($savaites_diena == 5) {
        $surukytos_cigaretes += $cizos_fri;
    } else {
        $surukytos_cigaretes += $cizos_sat_sun;
    }
}
$viso_kaina = $surukytos_cigaretes * $cigaretes_kaina;
$ket_penk_cigareciu_kaina = $viso_kaina - $ket_penk_cigaretes * $cigaretes_kaina;
?>
<html>
    <head>
        <title>Cigaretes</title>
    </head>
    <body>
        <p>Per metus surukysiu <?php print $surukytos_cigaretes; ?> cigareciu uz <?php print $viso_kaina; ?></p>
        <p>Nerukydamas Pirmadieni-ketvirtadieni sutaupyciau <?php print $ket_penk_cigareciu_kaina; ?> eur.</p>
    </body>
</html>