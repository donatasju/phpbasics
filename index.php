<?php
define('STORAGE_FILE', 'files/form_input.txt');

require_once 'functions/form.php';
require_once 'functions/file.php';

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
                'title' => 'Narsolio klycka',
                'value' => $user_input['vardas']
            ],
            [
                'title' => 'Sasyskos ant raskladuskes',
                'value' => $user_input['sasyska']
            ],
            [
                'title' => 'Sasysku paslaptis',
                'value' => $user_input['paslaptis']
            ],
            [
                'title' => 'Daktariska desra kojos formos',
                'value' => $user_input['koja']
            ],
            [
                'title' => 'Tavo ismintis kalba',
                'value' => $user_input['ismintis']
            ]
        ];
    }

    return $stored_data;
}

$form = [
    'fields' => [
        'vardas' => [
            'label' => 'Narsolio klycka',
            'type' => 'text',
            'placeholder' => 'Vardas',
            'validate' => [
                'validate_not_empty'
            ]
        ],
        'sasyska' => [
            'label' => 'Kiek sasysku suguldytum ant raskladuskes?',
            'type' => 'text',
            'placeholder' => '1-100',
            'validate' =>
            [
                'validate_not_empty',
                'validate_is_number'
            ]
        ],
        'paslaptis' => [
            'label' => 'Kokia sasyska megstamiausia? Nebijok, niekas nepamatys...',
            'type' => 'password',
            'placeholder' => 'Pieniskos sasyskos baravyku skonio',
            'validate' =>
            [
                'validate_not_empty'
            ]
        ],
        'koja' => [
            'label' => 'Ar valgytum daktariska desra, jeigu ji butu tavo pedos formos?',
            'type' => 'text',
            'placeholder' => 'Suvalgyciau ir apsilaizyciau',
            'validate' =>
            [
                'validate_not_empty'
            ]
        ],
        'ismintis' => [
            'label' => 'Narsolio ismintis byloja...pvz: ',
            'type' => 'text',
            'placeholder' => 'Taskyk netaskes, vis tiek bybis kiausai',
            'validate' =>
            [
                'validate_not_empty'
            ]
        ]
    ],
    'buttons' => [
        'do_zirniai' => [
            'text' => 'Ejaculate and Evacuate'
        ]
    ],
    'delete_button' => [
        'delete_file' => [
            'text' => 'Sutarsyti'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => [
            'form_fail'
        ]
    ]
];

$show_form = true;

if (!isset($_COOKIE['form'])) {
    if (!empty($_POST)) {
        $delete_file = $_POST['action'] ?? false;

        if ($delete_file == 'delete_file') {
            unlink(STORAGE_FILE);
            $show_form = true;
        }
        $safe_input = get_safe_input($form);
        $form_success = validate_form($safe_input, $form);

        if ($form_success) {
            setcookie('form', 'submitted', time() + 3600, '/');
            $show_form = false;
        }
    }
} else {
    $show_form = false;
}


$stored_data = load_form_data();
var_dump($_POST);
?>
<html>
    <head>
        <title>02/14/2019</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <h1>Generuojam forma is array</h1>
        <?php if ($show_form): ?>
            <form method="POST" id="form1">
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
                <?php foreach ($form['delete_button'] as $delete_button_id => $button): ?>
                    <button name="action" value="<?php print $delete_button_id; ?>">
                        <?php print $button['text']; ?>
                    </button>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($stored_data as $user_data): ?>
                    <?php foreach ($user_data as $fields): ?>       
                        <p><?php print $fields['title'] . ': ' . $fields['value']; ?></p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </form>
            <?php foreach ($form['delete_button'] as $delete_button_id => $button): ?>
                <button form="form1" name="action" value="<?php print $delete_button_id; ?>">
                    <?php print $button['text']; ?>
                </button>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>