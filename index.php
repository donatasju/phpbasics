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
?>
<html>
    <head>
        <title>BBD mat</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="flex">
            <?php foreach ($bbd as $key => $value): ?>
                <div class="block <?php print $value['forma'] . ' ' . $value['spalva'] ?>">
                    <span><?php print $value['textas'] ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>