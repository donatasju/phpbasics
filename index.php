<?php

function validate_not_empty($input, &$forma) {

    foreach ($forma['input'] as $key => &$fields) {
        if ($input[$key] == '') {
            $fields['error_msg'] = 'Iveskite duomenis';
        }
    }
    return $forma;
}

function get_safe_input($form) {
    $filtro_parametrai = [];

    foreach ($form['input'] as $key => $value) {
        $filtro_parametrai[$key] = FILTER_SANITIZE_SPECIAL_CHARS;
    }

    $filtro_parametrai['action'] = FILTER_SANITIZE_SPECIAL_CHARS;

    return filter_input_array(INPUT_POST, $filtro_parametrai);
}

$form = [
    'input' => [
        'name' =>
        [
            'type' => 'text',
            'placeholder' => 'Vardas',
            'label' => 'Mano Vardas'
        ],
        'zirniai' =>
        [
            'type' => 'text',
            'placeholder' => '1-100',
            'label' => 'Kiek turiu zirniu?'
        ],
        'reason' =>
        [
            'placeholder' => 'issipasakok',
            'label' => 'Paslaptis',
            'type' => 'password',
        ],
    ],
    'button' => [
        'do_zirniai' =>
        [
            'label' => 'paberti'
        ]
    ]
];

if (!empty($_POST)) {
    $input = get_safe_input($form);
    validate_not_empty($input, $form);
}

?>
<html>
    <head>
        <title>Forma is array</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form method="POST">
            <?php foreach ($form['input'] as $input_index => $input): ?>
                <label>
                    <p><?php print $input['label']; ?></p>
                    <input type="<?php print $input['type']; ?>" 
                           name="<?php print $input_index; ?>" 
                           placeholder="<?php print $input['placeholder']; ?>">
                           <?php if (isset($input['error_msg'])): ?>
                        <p><?php print $input['error_msg']; ?></p>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>
            <?php foreach ($form['button'] as $key => $value): ?>
                <button
                    name="action" 
                    value="<?php print $key; ?>">
                        <?php print $value['label']; ?>
                </button>
            <?php endforeach; ?>
        </form>
    </body>
</html>