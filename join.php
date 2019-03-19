<?php
require_once 'bootstrap.php';

session_start();

if (file_exists(STORAGE_FILE)) {
    $teams_array = file_to_array(STORAGE_FILE);
    if (empty($teams_array[0]['team_name'])) {
        header("Location: create.php");
        exit();
    }
} else {
    header("Location: create.php");
    exit();
}

function form_success($safe_input, $form) {
    $team_idx = $safe_input['team'];
    $player = [
        'nick_name' => $safe_input['nick'],
        'score' => 0
    ];

    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $team_players = &$teams_array[$team_idx]['players'];
        $team_players[] = $player;
        $_SESSION['nick'] = $safe_input['nick'];
        $_SESSION['team'] = $safe_input['team'];
        $_SESSION['player_idx'] = count($team_players) - 1;
        return array_to_file($teams_array, STORAGE_FILE);
    }
}

function validate_nick($field_input, &$field, $form_input) {
    $team_idx = $form_input['team'];
    if (file_exists(STORAGE_FILE)) {
        $teams_array = file_to_array(STORAGE_FILE);
        $player_team = $teams_array[$team_idx];

        foreach ($player_team['players'] as $player) {
            if ($player['nick_name'] == $field_input) {
                $field['error_msg'] = strtr('Pz2aball Å¾aidÄ—jas '
                        . 'komandoje "@team_name" '
                        . 'su nick`u "@nick" jau egzistuoja!', [
                    '@team_name' => $player_team['team_name'],
                    '@nick' => $player['nick_name']
                ]);
                return false;
            }
        }
    }

    return true;
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
        'fail' => []
    ]
];

$show_form = true;
$message = '';

if (!isset($_SESSION['nick'])) {
    if (!empty($_POST)) {
        $safe_input = get_safe_input($form);
        $form_success = validate_form($safe_input, $form);

        if ($form_success) {
            $show_form = false;
            $message = 'Sekmingai sukurei savo nick';
        }
    }
} else {
    $show_form = false;
    $message = strtr('Zdarova pizdaballs zaidejau  "@nick". Jau esi komandoje: @team ', ['@nick' => $_SESSION['nick'],
        '@team' => get_team_names()[$_SESSION['team']]
    ]);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>PZ2ABALL | Join Team</title>
    </head>
    <body>
        <!-- Navigation -->    
        <?php require 'objects/navigation.php'; ?>        

        <!-- Content -->       
        <h1>Join a PZ2ABALL team!</h1>
        <?php if ($show_form): ?>

            <!-- Form -->        
            <?php require 'objects/form.php'; ?>
        <?php else: ?>
            <h2>Zasibys!</h2>
            <h3><?php print $message; ?></h3>
        <?php endif; ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>