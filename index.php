<?php
$sunny = rand(0, 1);
if ($sunny) {
    $oras = 'sauleta';
    $textas = 'Sauleta';
} else {
    $oras = 'debesuota';
    $textas = 'Debesuota';
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="<?php print $oras; ?>"></div>
        <h1><?php print $textas; ?></h1>
    </body>
</html>