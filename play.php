<?php
require_once 'bootstrap.php';

session_start();

$team_idx = $_SESSION['team'] ?? false;
$nick = $_SESSION['nick'] ?? false;

$form = [
    'fields' => [
        'ball_handler' => [
            'label' => 'Kam pasuoji?',
            'type' => 'select',
            'options' => get_players_names($team_idx, $nick),
            'validate' => [
                'validate_not_empty',
                'validate_kick'
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Kick the ball!'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ]
];

function get_players_names($team_idx, $nick) {
    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $team = $teams_array[$team_idx] ?? false;

        if ($team) {
            $names_array = array_column($team['players'], 'nick_name');

            foreach ($names_array as $name_idx => $name) {
                if ($name == $_SESSION['nick']) {
                    unset($names_array[$name_idx]);
                    return $names_array;
                }
            }
        }
    }

    return [];
}

function form_success($safe_input, $form) {
    $team_idx = $_SESSION['team'] ?? false;
    $nick = $_SESSION['nick'] ?? false;
    $player_ind = $_SESSION['player_idx'] ?? false;

    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);

        $teams_array[$team_idx]['ball_handler'] = $safe_input['ball_handler'];
        $teams_array[$team_idx]['players'][$player_ind]['score'] ++;

        return array_to_file($teams_array, STORAGE_FILE);
    }
}

function validate_kick($field_input, &$field, $input) {
    $team_idx = $_SESSION['team'] ?? false;
    $nick = $_SESSION['nick'] ?? false;
    $player_ind = $_SESSION['player_idx'] ?? false;

    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        if ($teams_array[$team_idx]['ball_handler'] == null || $teams_array[$team_idx]['ball_handler'] == $player_ind) {
            return true;
        } else {
            $field['error_msg'] = 'Negali pasuoti, nes neturi kamuolio';
        }
    }

    return false;
}

function check_player($team_idx, $nick) {
    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $player_team = $teams_array[$team_idx] ?? false;

        if ($player_team) {
            return in_array($nick, array_column(
                            $player_team['players'], 'nick_name')
            );
        }
    }

    return false;
}

$show_form = false;
$valid_player = false;
$message = '';

if (!empty($_SESSION)) {
    $nick = $_SESSION['nick'] ?? false;
    $team_idx = $_SESSION['team'] ?? false;

    if ($nick && $team_idx !== false) {
        $valid_player = check_player($team_idx, $nick);
    }
}

if ($valid_player) {
    $show_form = true;

    if (!empty($_POST)) {
        $safe_input = get_safe_input($form);
        $form_success = validate_form($safe_input, $form);
    }
} else {
    header("Location: join.php");
    exit();
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>PZ2ABALL | Play</title>
    </head>
    <body>
        <!-- Navigation -->    
        <?php require 'objects/navigation.php'; ?>        

        <!-- Content -->       
        <h1>Išbėk į aikštelę</h1>
        <?php if ($show_form): ?>
            <!-- Form -->        
            <?php require 'objects/form.php'; ?>
        <?php else: ?>
            <h2>Zašibys!</h2>
            <h3><?php print $message; ?></h3>
        <?php endif; ?>
    </body>
</html>