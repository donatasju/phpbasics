<?php
$days = 365;
$pakelio_kaina = 3.50;
$cigaretes_kaina = $pakelio_kaina / 20;
$surukytos_cigaretes = 0;
$pirm_ketv_cigaretes = 0;
$rukymo_laikas = 5;

for ($i = 0; $i < $days; $i++) {
    $cizos_mon_thu = rand(3, 4);
    $cizos_fri = rand(10, 20);
    $cizos_sat_sun = rand(1, 3);
    $savaites_diena = date('N', strtotime("+$i day"));

    if ($savaites_diena >= 1 && $savaites_diena <= 4) {
        $surukytos_cigaretes += $cizos_mon_thu;
        $pirm_ketv_cigaretes += $cizos_mon_thu;
    } elseif ($savaites_diena == 5) {
        $surukytos_cigaretes += $cizos_fri;
    } else {
        $surukytos_cigaretes += $cizos_sat_sun;
    }
}

$viso_kaina = $surukytos_cigaretes * $cigaretes_kaina;
$pirm_ketv_cigareciu_kaina = $pirm_ketv_cigaretes * $cigaretes_kaina;
$viso_hours = $surukytos_cigaretes * $rukymo_laikas / 60;
$najobkes = $surukytos_cigaretes % 20;
?>
<html>
    <head>
        <title>Cigaretes</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <p>Per metus surukysiu <?php print $surukytos_cigaretes; ?> cigareciu uz <?php print $viso_kaina; ?></p>
        <p>Nerukydamas Pirmadieni-ketvirtadieni sutaupyciau <?php print $pirm_ketv_cigareciu_kaina; ?> eur.</p>
        <p>Per metus pastrovesiu traukdamas <?php print $viso_hours; ?> valandu</p>
        <?php for ($i = 1; $i <= $surukytos_cigaretes; $i++): ?>
            <?php if ($i % 20 == 0): ?>
                <div class="paciokas">
                    <?php for ($j = 1; $j <= 20; $j++): ?>
                        <div class="ciza"></div>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
        <div class="paciokas">
            <?php for ($i = 1; $i <= $najobkes; $i++): ?>
                <div class="ciza"></div>
            <?php endfor; ?>
        </div>
    </body>
</html>