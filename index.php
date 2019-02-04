<?php
$array = [
    [
        'tekstas' => 'As',
        'color' => 'green',
        'form' => 'apskritimas'
    ],
    [
        'tekstas' => 'B',
        'color' => 'green',
        'form' => 'kvadratas'
    ],
    [
        'tekstas' => 'B',
        'color' => 'orange',
        'form' => 'kvadratas'
    ],
    [
        'tekstas' => 'D',
        'color' => 'red',
        'form' => 'kvadratas'
    ]
];
?>

<html>
    <head>
        <title>pzdamatas</title>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <div class="flex">
            <?php foreach ($array as $value): ?>
                <div class="block <?php print $value['color'] . ' ' . $value['form']; ?>">
                    <span><?php print $value['tekstas']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>