<?php

function slot_run($rows, $cols) {
    $array = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $array[$i][$j] = rand(0, 1);
        }
    }
    return $array;
}

function slot_check($array) {
    $winners = [];
    foreach ($array as $key => $value) {
        if (array_sum($value) == count($value)) {
            $winners[] = $key;
        }
    }
    return $winners;
}

$game = slot_run(3, 3);
$laimetojai = slot_check($game);
?>
<html>
    <head>
        <title>Slot mashine</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container">
            <?php foreach ($game as $key => $row): ?>
                <div class="kubas-<?php print (in_array($key, $laimetojai) ? 'win' : 'loose'); ?>">
                    <?php foreach ($row as $skaicius): ?>
                        <div class="stulpelis klase_<?php print $skaicius ?>"></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>