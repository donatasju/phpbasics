<?php
define('STORAGE_FILE', 'files/file.txt');

require_once 'functions/form.php';
require_once 'functions/files.php';

function form_success($safe_input, $form) {
    if (file_exists(STORAGE_FILE)) {
        $existing_array = file_to_array(STORAGE_FILE);
        $existing_array[] = $safe_input;
    } else {
        $existing_array = [$safe_input];
    }

    return array_to_file($existing_array, STORAGE_FILE);
}

function form_fail($safe_input, $form) {
    // TO DO
}

function load_form_data() {
    $stored_data = [];

    if (file_exists(STORAGE_FILE)) {
        $file_data_arr = file_to_array(STORAGE_FILE);
    } else {
        return $stored_data;
    }
    // Build renderable array
    foreach ($file_data_arr as $user_input) {
        $stored_data[] = [
            [
                'title' => 'Tavo vardas',
                'value' => $user_input['vardas']
            ],
            [
                'title' => 'Tavo pavarde',
                'value' => $user_input['pavarde']
            ],
            [
                'title' => 'Duhas ar duhe',
                'value' => $user_input['duhas/e']
            ],
            [
                'title' => 'Tavo ugis',
                'value' => $user_input['ugis']
            ],
            [
                'title' => 'Banano ilgio paslaptis',
                'value' => $user_input['bananas']
            ]
        ];
    }

    return $stored_data;
}

$form = [
    'fields' => [
        'vardas' => [
            'label' => 'Mano vardas',
            'type' => 'text',
            'placeholder' => 'Vardas',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'pavarde' => [
            'label' => 'Mano pavarde',
            'type' => 'text',
            'placeholder' => 'Pavarde',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'duhas/e' => [
            'label' => 'Duhas ar duhe ?',
            'type' => 'text',
            'placeholder' => 'Vardas',
            'validate' => [
                'validate_not_empty'
            ],
        ],
        'ugis' => [
            'label' => 'Tavo ugis ?',
            'type' => 'text',
            'placeholder' => '1-100',
            'validate' =>
            [
                'validate_not_empty',
                'validate_is_number'
            ],
        ],
        'bananas' => [
            'label' => 'banano ilgis cm',
            'type' => 'password',
            'placeholder' => 'Issipasakok',
            'validate' =>
            [
                'validate_not_empty',
            ],
        ]
    ],
    'buttons' => [
        'do_zirniai' => [
            'text' => 'Paberti...'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => [
            'form_fail'
        ]
    ],
];

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $validation = validate_form($safe_input, $form);
}

$stored_data = load_form_data();
?>
<html>
    <head>
        <title>02/11/2019</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Generuojam forma is array</h1>
        <form method="POST">
            <!-- Input Fields -->
            <?php foreach ($form['fields'] as $field_id => $field): ?>
                <label>
                    <p><?php print $field['label']; ?></p>
                    <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                    <?php if (isset($field['error_msg'])): ?>
                        <p class="error"><?php print $field['error_msg']; ?></p>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>

            <!-- Buttons -->
            <?php foreach ($form['buttons'] as $button_id => $button): ?>
                <button name="action" value="<?php print $button_id; ?>">
                    <?php print $button['text']; ?>
                </button>
            <?php endforeach; ?>
        </form>
        <?php foreach ($stored_data as $user_data): ?>
            <?php foreach ($user_data as $fields): ?>       
                <p><?php print $fields['title'] . ': ' . $fields['value']; ?></p>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </body>
</html>