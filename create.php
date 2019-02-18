<?php
define('STORAGE_FILE', 'files/form_input.txt');

require_once 'functions/form.php';
require_once 'functions/file.php';

function form_success($safe_input, $form) {
    $team = [
        'team_name' => $safe_input['team_name'],
        'players' => []
    ];

    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $teams_array[] = $team;
    } else {
        $teams_array = [$team];
    }

    return array_to_file($teams_array, STORAGE_FILE);
}

function form_fail($safe_input, $form) {
    // TO DO
}

function validate_team_name($field_input, &$field) {
    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);

        foreach ($teams_array as $team) {
            if ($team['team_name'] == $field_input) {
                $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                        . 'toks team name @field yra uzimtas', ['@field' => $field_input
                ]);
                return false;
            }
        }
    }

    return true;
}

$form = [
    'fields' => [
        'team_name' => [
            'label' => 'Create team',
            'type' => 'text',
            'placeholder' => 'Team name',
            'validate' => [
                'validate_not_empty',
                'validate_team_name'
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Create'
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

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);

    if ($form_success) {
        $show_form = false;
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Call Friday</title>
    </head>
    <body>
        <h1>Call Friday</h1>
        <?php if ($show_form): ?>
            <form method="POST">
                <?php foreach ($form['fields'] as $field_id => $field): ?>
                    <label>
                        <span><?php print $field['label']; ?></span>

                        <!-- Form field -->            
                        <?php if (in_array($field['type'], ['text', 'password'])): ?>
                            <!-- Simple input field: text, password -->
                            <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                        <?php elseif ($field['type'] == 'select'): ?>
                            <!-- Select field -->
                            <select name="<?php print $field_id; ?>">
                                <?php foreach ($field['options'] as $option_id => $option_label): ?>
                                    <option value="<?php print $option_id; ?>"><?php print $option_label; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>

                        <!-- Errors -->
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
        <?php else: ?>
            <p>mldc</p>
        <?php endif; ?>
    </body>
</html>