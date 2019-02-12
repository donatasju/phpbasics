<?php
/**
 * Prevents HTML/JS/MYSQL injection
 * for all $form fields
 * & adds error messages if so
 * @param array $form
 * @return array Safe Input
 */
function get_safe_input($form) {
    $filtro_parametrai = [
        'action' => FILTER_SANITIZE_SPECIAL_CHARS
    ];

    foreach ($form['fields'] as $field_id => $value) {
        $filtro_parametrai[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
    }

    return filter_input_array(INPUT_POST, $filtro_parametrai);
}

/**
 * Check all form fields if they are not empty
 * & adds error messages if so
 * @param array $safe_input
 * @param array $form
 * @return type
 */
function validate_not_empty($safe_input, &$form) {
    foreach ($form['fields'] as $field_id => &$field) {
        if (strlen($safe_input == 0)) {
            $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                    . 'kad palika @field tuscia!',
                    ['@field' => $field['label']
            ]);
        } else {
            
            return true;
        }
    }
}

function validate_form($input, &$field) {
    foreach($form['fields'] as $field) {
        foreach($field['validators'] as $validator)
        if(is_callable($validator)) {
            var_dump('lol');
        } else {
            throw new Exception("Not found validate_not_empty function");
        }
    }
}

$form = [
    'fields' => [
        'vardas' => [
            'label' => 'Mano vardas',
            'type' => 'text',
            'placeholder' => 'Vardas',
            'validators' => [
                'validate_not_empty',
            ]
        ],
        'zirniu_kiekis' => [
            'label' => 'Kiek turiu zirniu?',
            'type' => 'text',
            'placeholder' => '1-100',
            'validators' => [
                'validate_not_empty',
            ]
        ],
        'paslaptis' => [
            'label' => 'Paslaptis, kodel turiu zirniu',
            'type' => 'password',
            'placeholder' => 'Issipasakok',
            'validators' => [
                'validate_not_empty',
            ]
        ]
    ],
    'buttons' => [
        'do_zirniai' => [
            'text' => 'Paberti...'
        ]
    ]
];

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    validate_not_empty($safe_input, $form);
}
?>

<html>
    <head>
        <title>02/11/2019</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Generuojam forma is array</h1>
        <form method="POST">
            <?php foreach ($form['fields'] as $field_id => $field): ?>
                <label>
                    <p><?php print $field['label']; ?></p>
                    <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                    <?php if (isset($field['error_msg'])): ?>
                        <p class="error"><?php print $field['error_msg']; ?></p>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>
            <?php foreach ($form['buttons'] as $button_id => $button): ?>
                <button name="action" value="<?php print $button_id; ?>">
                    <?php print $button['text']; ?>
                </button>
            <?php endforeach; ?>
        </form>
    </body>
</html>