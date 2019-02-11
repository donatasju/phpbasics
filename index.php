<?php
$array = [
    'input' => [
        [
            'text' => 'Mano vardas',
            'type' => 'text',
            'id' => 'name',
            'placeholder' => 'Vardas',
        ],
        [
            'text' => 'Kiek turiu zirniu ?',
            'type' => 'text',
            'id' => 'name',
            'placeholder' => '1-100',
        ],
        [
            'text' => 'Paslaptis, kodel turiu zirniu',
            'type' => 'password',
            'id' => 'reason',
            'placeholder' => 'Issipasakok',
        ]
    ],
    'button' => [
        [
            'text' => 'Paberti...',
            'name' => 'action',
            'value' => 'do_zirniai',
        ]
    ]
];
?>
<html>
    <head>
        <title>Hack Me</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <h1></h1>
        <h2>Hack this page</h2>
        <form method="POST">
            <label>
                <?php foreach ($array['input'] as $input): ?>
                    <span><?php print $input['text']; ?></span>
                    <input type="<?php print $input['type']; ?>" name="<?php print $input['id']; ?>" placeholder="<?php print $input['placeholder']; ?>">
                <?php endforeach; ?>
            </label>
            <?php foreach ($array['button'] as $button): ?>
                <button name="<?php print $button['name']; ?>" value="<?php print $button['value']; ?>"><?php print $button['text']; ?></button>
            <?php endforeach; ?>
        </form>
    </body>
</html>
