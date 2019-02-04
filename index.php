<?php
$bbd = [
    [
        'forma' => 'apskritimas',
        'spalva' => 'green',
        'textas' => 'AS'
    ],
    [
        'forma' => 'kvadratas',
        'spalva' => 'green',
        'textas' => 'B'
    ],
    [
        'forma' => 'kvadratas',
        'spalva' => 'orange',
        'textas' => 'B'
    ],
    [
        'forma' => 'kvadratas',
        'spalva' => 'red',
        'textas' => 'D'
    ]
];

function pzdamat($bbd, $l) {
    foreach ($bbd as $key => &$dalis) {
        if ($key > $l) {
            $dalis['spalva'] = 'gray';
        }
        $dalis['show_text'] = true;
    }
    return $bbd;
}

$l = rand(0, 3);
$bbd = pzdamat($bbd, $l);
?>
<html>
    <head>
        <title>BBD mat</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="flex">
            <?php foreach ($bbd as $dalis): ?>
                <div class="block <?php print $dalis['forma'] . ' ' . $dalis['spalva']; ?>">
                    <?php if ($dalis['show_text']): ?>
                        <span><?php print $dalis['textas']; ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>