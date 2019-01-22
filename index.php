<?php
$sunny = rand(0,1);
if ($sunny) {
    $class = 'sunny';
    $text = 'Sauleta';
}
else {
    $class = 'shitty';
    $text = 'Debesuota';
};

?>
<html>
    <head>
        <title>Uzduotis 5</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="<?php print $img; ?>"></div>
        <div>
            <h1><?php print $text; ?></h1>
        </div>
    </body>
</html>