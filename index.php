<?php
Date_default_timezone_set('Europe/Vilnius');

$lygis = $_POST['lygis'] ?? false;
$kiekis = $_POST['kiekis'] ?? false;
/**
 * 
 * @param type $lygis
 * @param type $kiekis
 * @return string
 */
function kelinta_valanda_bus_pizda($lygis, $kiekis) {
    $uzduotys = [
        '1 lygis' => 12,
        '2 lygis' => 24,
        '3 lygis' => 36,
        '4 lygis' => 48,
        '5 lygis' => 60,
        '6 lygis' => 72,
        '7 lygis' => 84,
        '8 lygis' => 96,
        '9 lygis' => 108,
        '10 lygis' => 120
    ];

    if ($uzduotys["$lygis lygis"] == 0) {
        $bus_pizda = 'Paziurekim kada tau bus pizda...';
    } else {
        $minutes_uzduociai_atlikti = $uzduotys["$lygis lygis"] * $kiekis;
        $bus_pizda = 'Tau bus pizda: ' . date('H:i', strtotime("+$minutes_uzduociai_atlikti minutes"));
    }
    return $bus_pizda;
}

if ($lygis && $kiekis) {
    $text = kelinta_valanda_bus_pizda($lygis, $kiekis);
} else {
    $text = 'Ivesk duomenis';
}
?>
<html>
    <head>
        <title>Funkcijos</title>
    </head>
    <body>
        <h1></h1>
        <form action="index.php" method="POST">
            <p>Iveskite kokio lygio (1-10) uzduotis norite spresti:</p>
            <input name="lygis" type="number"/>
            <p>Iveskite kiek uzduociu norite spresti:</p> 
            <input name="kiekis" type="number"/><br>
            <input type="submit"/>
            <p><?php print $text; ?></p>
        </form>
    </body>
</html>