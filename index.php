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

$slot_mashine = slot_run(3, 3);
?>
<html>
    <head>
        <title>Slot mashine</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php foreach ($slot_mashine as $row): ?>
            <div class="kubas">
                <?php foreach ($row as $skaicius): ?>
                    <div class="stulpelis klase_<?php print $skaicius ?>"></div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </body>
</html>