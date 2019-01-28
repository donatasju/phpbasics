<?php
$dishes = [
    [
        'name' => 'Nut salad',
        'price' => 3.44,
        'foto' => 'nutt',
        'ingridients' => [
            'Nuts',
            'Joghurt'
        ]
    ],
    [
        'name' => 'Bulldish',
        'price' => 4.77,
        'foto' => 'test',
        'ingridients' => [
            'Rice',
            'Soya',
        ]
    ]
];
?>
<html>
    <head>
        <title>Dishes uzduotis</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="dishes">
            <?php foreach ($dishes as $dish): ?>
                <div class="<?php print $dish['foto']; ?>"><?php print "{$dish['name']}: {$dish['price']}$" ?></div>
                <p>Ingridients:</p>
                <ul>                    
                    <?php foreach ($dish['ingridients'] as $ingridient): ?>                        
                        <li><?php print $ingridient; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    </body>
</html>