<?php
require_once 'bootstrap.php';

function form_success($safe_input, $form) {

    if (file_exists(STORAGE_FILE)) {
        $users_array = file_to_array(PLAYERS_FILE);

        return array_to_file($users_array, PLAYERS_FILE);
    }
}

function validate_login($safe_input, &$form) {
    if (file_exists(PLAYERS_FILE)) {
        $users_array = file_to_array(PLAYERS_FILE);
        foreach ($users_array as $user) {
            if ($user['user_name'] == $safe_input['user_name'] && $user['password'] == $safe_input['password']) {
                return true;
            } else {
                $form['fields']['user_name']['error_msg'] = 'Galibut but blogai ivedei username';
                $form['fields']['password']['error_msg'] = 'Galibut blogai ivedei passworda';
            }
        }

        return false;
    }
}

$form = [
    'fields' => [
        'user_name' => [
            'label' => 'Username',
            'type' => 'text',
            'placeholder' => 'Lopas123',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'placeholder' => 'your password',
            'validate' => [
                'validate_not_empty',
            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Prisijungti!'
        ]
    ],
    'validate' => [
        'validate_login'
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ]
];

$show_form = true;

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);

    if ($form_success) {
        $success_msg = strtr('Useris "@user_name" sėkmingai Prisijungete!', [
            '@user_name' => $safe_input['user_name']
        ]);
        $show_form = false;
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>PZ2ABALL</title>
    </head>
    <body>
        <!-- Navigation -->    
        <?php require 'objects/navigation.php'; ?>        

        <!-- Content -->    
        <h1>Login!</h1>

        <?php if ($show_form): ?>
            <!-- Form -->        
            <?php require 'objects/form.php'; ?>
        <?php else: ?>
            <h2>Zašibys!</h2>
            <h3><?php print $success_msg; ?></h3>
        <?php endif; ?>
    </body>
</html>