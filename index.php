<?php
date_default_timezone_set('Europe/Vilnius');
$days = 365;
$rukau = 0;
$nerukau = 0;
$pakelio_kaina = 3.50;
$cigaretes_kaina = $pakelio_kaina / 20;
$rukymo_laikas =  5 * 60 / 3600;
$viso_hours = 0;
        
for ($i = 0; $i <= $days; $i++) {
    $date = date('N', strtotime("+$i day"));
    if ($date >= 1 && $date <= 4) {
        $cizos_mon_thu = rand(3, 10);
        $nerukau += $cizos_mon_thu;
        $rukau += $cizos_mon_thu;
        $viso_hours += $cizos_mon_thu * $rukymo_laikas;
    } elseif ($date == 5) {
        $cizos_fri = rand(10, 20);
        $rukau += $cizos_fri;
        $viso_hours += $cizos_fri * $rukymo_laikas;
    } else {
        $cizos_sat_sun = rand(1, 5);
        $rukau += $cizos_sat_sun;
        $viso_hours += $cizos_sat_sun * $rukymo_laikas;
    }
}
$viso_kaina = $rukau * $cigaretes_kaina;
$nerukau = ($rukau - $nerukau) * $cigaretes_kaina;

?>
<html>
    <head>
        <title>Uzduotis 4</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <p>Per metus surukysiu <?php print $rukau; ?> cigareciu uz <?php print $viso_kaina; ?> euru.<br>
            Nerukydamas Pirmad-Ketvirtadieni sutaupyciau <?php print $nerukau; ?> eur.<br>
            Per metus prastovesiu traukdamas <?php print $viso_hours ?> valandu.
        </p>
        <div class="flex">
            <?php for ($j = 1; $j <= $rukau; $j++): ?>
            <div class="cig"><?php print $j; ?></div>
            <?php endfor; ?>
        </div>
    </body>
</html>