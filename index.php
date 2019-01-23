<?php
$t = rand(1, 10);
$text = 'N';
for ($i = 0; $i < $t; $i++) {
    $text .= 'x';
}
?>
<html>
    <head>
        <title>Nxx uzduotis</title>
    </head>
    <body>
        <h1>As po <?php print $t; ?> valandu praktikos</h1>
        <h2><?php print $text; ?> koks pavarges</h2>
    </body>
</html>