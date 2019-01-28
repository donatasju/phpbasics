<?php
$dishes = [
    [
        'name' => 'Nut salad',
        'price' => 3.44,
        'ingredients' => [
            'Nuts',
            'Joghurt'
        ]
    ],
    [
        'name' => 'Bulldish',
        'price' => 4.77,
        'ingredients' => [
            'Rice',
            'Soja Sauce'
        ]
    ]
];
?>

<html>
    <head>
        <title>dishes</title>
    </head>
    <body>
        <div class="dishes">
            <?php foreach ($dishes as $value): ?>
                <h2><?php print "{$value['name']} - {$value['price']}$"; ?></h2>
                <ol>
                    <?php foreach ($value['ingredients'] as $ingredient): ?>
                        <li>
                            <?php print $ingredient; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endforeach; ?>
        </div>
    </body>
</html>