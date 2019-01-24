<?php
date_default_timezone_set('Europe/Vilnius');
$days = 365;
$viso_cizu = 0;
$nerukau_mon_thu = 0;
$pakelio_kaina = 3.50;
$cigaretes_kaina = $pakelio_kaina / 20;
$rukymo_laikas = 5;
$viso_hours = 0;

for ($i = 0; $i <= $days; $i++) {
    $date = date('N', strtotime("+$i day"));

    if ($date >= 1 && $date <= 4) {
        $cizos_mon_thu = rand(3, 10);
        $nerukau_mon_thu += $cizos_mon_thu;
        $viso_cizu += $cizos_mon_thu;
    } elseif ($date == 5) {
        $cizos_fri = rand(10, 20);
        $viso_cizu += $cizos_fri;
    } else {
        $cizos_sat_sun = rand(1, 5);
        $viso_cizu += $cizos_sat_sun;
    }
}

$viso_kaina = $viso_cizu * $cigaretes_kaina;
$sutaupau = $nerukau_mon_thu * $cigaretes_kaina;
$viso_hours += $viso_cizu * $rukymo_laikas / 60;
$pakeliai = $viso_cizu / 20;
$liko = $viso_cizu % 20;
?>
<html>
    <head>
        <title>Uzduotis 8</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <p>Per metus surukysiu <?php print $viso_cizu; ?> cigareciu uz <?php print $viso_kaina; ?> euru.<br>
            Nerukydamas Pirmad-Ketvirtadieni sutaupyciau <?php print $sutaupau; ?> eur.<br>
            Per metus prastovesiu traukdamas <?php print $viso_hours ?> valandu.
        </p>
        <div class="flex">
            <?php for ($j = 1; $j <= $viso_cizu; $j++): ?>
                <?php if ($liko): ?>
                    <div class="pakeliai">
                        <?php for ($i = 1; $i <= 20; $i++): ?>
                            <div class="cig"></div>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
            <?php for ($i = 1; $i <= $liko; $i++): ?>
                <div class="cig"></div>
            <?php endfor; ?>
        </div>
    </body>
</html>