<?php

function add($x, $y) {
    $sum = $x + $y;
    print "$x + $y suma: $sum";
}
?>
<html>
    <head>
        <title></title>

    </head>
    <body>
        <h1><?php print add(5, 4); ?> </h1>
    </body>
</html>