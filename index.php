<?php
$mano_atmintis = [
    'Penktadienis',
    'Alaus',
    'Degtine',
    'GinTonic',
    'Viskis',
    'Parukyt',
    'degtine',
    'kokteilis',
    'parukyt',
    'bbz'
];
$draugo_atmintis = [
    'Penktadienis',
    'Alus',
    'Degtine',
    'GinTonic',
    'Viskis',
    'Neruko',
    'Tulikas',
    'Vemt',
    'neruko',
    'koma'
];
$counter = count($mano_atmintis);
$rand_flashback = $mano_atmintis[rand(0, $counter -1)];
?>
<html>
    <head>
        <title>uzd 2</title>
    </head>
    <body>
        <h1>WTF?!</h1>
        <h2>Mano atmintis:</h2>
        <ul>
            <?php foreach ($mano_atmintis as $value): ?>
            <li><?php print $value; ?></li>
            <?php endforeach; ?>
        </ul>
        <h3>Flashback: <?php print $rand_flashback; ?></h3>
        <h2>Draugo atmintis:</h2>
        <ul>
            <?php foreach ($draugo_atmintis as $value): ?>
            <li><?php print $value; ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>