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

function slot_check($slots) {
    $success_slots = [];

    foreach ($slots as $index => $value) {
        foreach ($value as $stulpelis) {
            if ($stulpelis == 1) {
                $lucky = true;
            } else {
                $lucky = false;
                break;
            }
        }
        if ($lucky) {
            $success_slots[] = $index;
        }
    }
    return $success_slots;
}

;

$lucky_winners = slot_check($slotai);
?>
<html>
    <head>
        <title>Bybis</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="main">
            <?php foreach ($slotai as $key => $row): ?>
                <div class="kubas-<?php print (in_array($key, $lucky_winners)) ? 'win' : 'loose'; ?>">
                    <?php foreach ($row as $stulpelis): ?>
                        <div class="class-<?php print $stulpelis; ?>"></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
