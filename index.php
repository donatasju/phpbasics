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
$counter = count($mano_atmintis);
$rand_flashback = $mano_atmintis[rand(0, $counter)];
?>
<html>
    <head>
        <title>uzd 2</title>
    </head>
    <body>
        <h1>WTF?!</h1>
        <h2>Mano atmintis:</h2>
        <h3>Flashback: <?php print $rand_flashback; ?></h3>
    </body>
</html>