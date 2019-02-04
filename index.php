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

function pzdamat($bbd){
    foreach($bbd as &$dalis){
        $dalis['spalva'] = 'red';
    }
    return $bbd;
}

$bbd = pzdamat($bbd);
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
                    <span><?php print $dalis['textas']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>