<?php
require_once 'bootstrap.php';

$form = [
    'fields' => [],
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

function form_success($safe_input, $form) {
    $team_idx = $_COOKIE['team'] ?? false;
    $nick = $_COOKIE['nick'] ?? false;

    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        foreach ($teams_array[$team_idx]['players'] as &$player) {
            if ($player['nick_name'] == $nick) {
                $player['score'] ++;
            }
        }

        return array_to_file($teams_array, STORAGE_FILE);
    }
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

if (!empty($_COOKIE)) {
    $nick = $_COOKIE['nick'] ?? false;
    $team_idx = $_COOKIE['team'] ?? false;

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
    $message = 'Eik nx';
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