<?php

function add($x, $y) {
    $sum = $x + $y;
    print "$x + $y suma: $sum";
}

$suma = add(5, 4)
?>
<html>
    <head>
        <title></title>

    </head>
    <body>
        <h1><?php print $suma; ?> </h1>
    </body>
</html>