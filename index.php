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
        'name' => 'Broken ass bone',
        'price' => 420,
        'foto' => 'test',
        'ingridients' => [
            'Guy',
            'Frozzen pool',
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
                <div class="dish">
                    <h3><?php print $dish['name'] ?></h3>
                    <div class="<?php print $dish['foto']; ?>"></div>
                    <p>Ingridients:</p>
                    <ul>                    
                        <?php foreach ($dish['ingridients'] as $ingridient): ?>                        
                            <li><?php print $ingridient; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p>Kaina: <?php print $dish['price'] ?>$</p>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>