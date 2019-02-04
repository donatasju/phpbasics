<?php
$bbd = [
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

function pzdamat($bbd) {
    foreach ($bbd as &$daiktas) {
        $daiktas['color'] = 'red';
    }
    
    return $bbd;
}

$bbd = pzdamat($bbd);
?>

<html>
    <head>
        <title>pzdamatas</title>
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        <div class="flex">
<?php foreach ($bbd as $daiktas): ?>
                <div class="block <?php print $daiktas['color'] . ' ' . $daiktas['form']; ?>">
                    <span><?php print $daiktas['tekstas']; ?></span>
                </div>
<?php endforeach; ?>
        </div>
    </body>
</html>