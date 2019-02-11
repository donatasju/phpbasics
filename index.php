<?php
$array = [
    'input' => [
        'name' => [
            'text' => 'Mano vardas',
            'type' => 'text',
            'placeholder' => 'Vardas',
        ],
        'zirniai' => [
            'text' => 'Kiek turiu zirniu ?',
            'type' => 'text',
            'placeholder' => '1-100',
        ],
        'reason' => [
            'text' => 'Paslaptis, kodel turiu zirniu',
            'type' => 'password',
            'placeholder' => 'Issipasakok',
        ]
    ],
    'button' => [
        'do_zirniai' => [
            'text' => 'Paberti...',
        ]
    ]
];

function get_safe_input($form) {
    $filter_param = [];

    foreach ($form['input'] as $key => $value) {
        $filter_param[$key] = FILTER_SANITIZE_SPECIAL_CHARS;
    }

    $filter_param['action'] = FILTER_SANITIZE_SPECIAL_CHARS;

    return filter_input_array(INPUT_POST, $filter_param);
}

var_dump(get_safe_input($array));
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
            <?php foreach ($array['input'] as $input_key => $input): ?>
                <label>
                    <span><?php print $input['text']; ?></span>
                    <input type="<?php print $input['type']; ?>" name="<?php print $input_key; ?>" placeholder="<?php print $input['placeholder']; ?>">
                </label>
            <?php endforeach; ?>
            <?php foreach ($array['button'] as $button_key => $button): ?>
                <button name="action" value="<?php print $button_key; ?>"><?php print $button['text']; ?></button>
            <?php endforeach; ?>
        </form>
    </body>
</html>
