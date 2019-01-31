<?php

function slot_run($rows, $cols) {
    $slots = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $slots[$i][$j] = rand(0, 1);
        }
    }
    return $slots;
}

$slotai = slot_run(3, 3);
?>
<html>
    <head>
        <title>Bybis</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php foreach ($slotai as $eile): ?>
            <div class="main">
                <?php foreach ($eile as $stulpelis): ?>
                    <div class="class-<?php print $stulpelis; ?>"></div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </body>
</html>
