<?php
$words = [
    'pizda',
    'zopa',
    'vapse',
    'alus',
    'ejau',
    'gerti',
    'nepavyko',
    'kelmas',
    'baxuras',
    'taskyti',
    'velnias',
    'miegoti',
    'pisam_slides!',
    'panos',
    'belenkas vyksta'
];
$rasinys = '';

$zodziai_like_sakiny = 0;

for (; strlen($rasinys) < 300;) {
    $random_zodzio_idx = rand(0, count($words) - 1);

    if ($zodziai_like_sakiny == 0) {
        if (strlen($rasinys) > 0) {
            $rasinys .= '. ';
        }
        $rasinys .= ' ' . ucfirst($words[$random_zodzio_idx]);
    } else {
        $rasinys .= ' ' . $words[$random_zodzio_idx];
    }

    if (!$zodziai_like_sakiny) {
        $zodziai_like_sakiny = rand(4, 12);
    }
    $zodziai_like_sakiny--;
}

?>
<html>
    <head>
        <title>Rasinys</title>
    </head>
    <body>
        <p><?php print $rasinys . '.' ?></p>
    </body>
</html>

