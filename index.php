<?php
$sunny = rand(0,1);
if($sunny){
    $oras = 'sauleta';
    $textas = 'sauleta';
}else {
    $oras = 'debesuota';
    $textas = 'debesuota';
};
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