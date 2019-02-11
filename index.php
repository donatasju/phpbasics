<?php
$array = [
    'input' => [
        [
            'type' => 'text',
            'name' => 'name',
            'placeholder' => 'Vardas',
            'label' => 'Mano Vardas'
        ],
        [
            'type' => 'text',
            'name' => 'zirniai',
            'placeholder' => '1-100',
            'label' => 'Kiek turiu zirniu?'
        ],
        [
            'name' => 'action',
            'placeholder' => 'issipasakok',
            'label' => 'Paslaptis',
            'type' => 'password',
        ],
    ],
    'button' => [
        [
            'name' => 'action',
            'value' => 'do_zirniai',
            'label' => 'paberti'
        ]
    ]
];
?>
<html>
    <head>
        <title>Hack me</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form method="POST">
            <?php foreach ($array['input'] as $input): ?>
                <label>
                    <span><?php print $input['label']; ?></span>
                    <input type="<?php print $input['type']; ?>" 
                           name="<?php print $input['name']; ?>" 
                           placeholder="<?php print $input['placeholder']; ?>">
                </label>
            <?php endforeach; ?>
            <?php foreach ($array['button'] as $value): ?>
                <button name="<?php print $value['name']; ?>" value="<?php print $value['value']; ?>"><?php print $value['label']; ?></button>
            <?php endforeach; ?>
        </form>
    </body>
</html>