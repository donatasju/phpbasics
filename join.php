<?php
define('STORAGE_FILE', 'files/form_input.txt');

require_once 'functions/form.php';
require_once 'functions/file.php';

function form_success($safe_input, $form) {
    $team_idx = $safe_input['team'];
    $player = [
        'nick_name' => $safe_input['nick'],
        'score' => 0
    ];

    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $teams_array[$team_idx]['players'][] = $player;
        return array_to_file($teams_array, STORAGE_FILE);
    }
}

function validate_nick($field_input, &$field, $form_inputs) {
    $team_idx = $form_inputs['team'];
    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $player_team = $teams_array[$team_idx];

        foreach ($player_team['players'] as $player) {
            if ($player['nick_name'] == $field_input) {
                $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                        . 'toks nick @field yra uzimtas', ['@field' => $field_input
                ]);
                return false;
            }
        }
    }

    return true;
}

function form_fail($safe_input, $form) {
    // TO DO
}

function get_team_names() {
    if (file_exists(STORAGE_FILE)) {

        $teams_array = file_to_array(STORAGE_FILE);
        return array_column($teams_array, 'team_name');
    }
    return [];
}

$form = [
    'fields' => [
        'team' => [
            'label' => 'Choose team',
            'type' => 'select',
            'validate' => [
                'validate_not_empty',
            //'validate_team_name'
            ],
            'options' => get_team_names()
        ],
        'nick' => [
            'label' => 'nick team',
            'type' => 'text',
            'placeholder' => 'Nickname',
            'validate' => [
                'validate_not_empty',
                'validate_nick'
            ],
        ]
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