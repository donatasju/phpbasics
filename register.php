<?php
require_once 'bootstrap.php';

function form_success($safe_input, $form) {
    $user = [
        'user_name' => $safe_input['user_name'],
        'password' => $safe_input['password']
    ];

    if (file_exists(STORAGE_FILE)) {
        $user_names_array = file_to_array(PLAYERS_FILE);
        $user_names_array[] = $user;
    } else {
        $user_names_array = [$user];
    }
    return array_to_file($user_names_array, PLAYERS_FILE);
}

function validate_username($field_input, &$field, $input) {
    if (file_exists(PLAYERS_FILE)) {
        $user_names_array = file_to_array(PLAYERS_FILE);
        foreach ($user_names_array as $user) {
            if ($user['user_name'] == $field_input) {
                $field['error_msg'] = strtr('Username tokiu pavadinimu '
                        . '"@user" jau egzistuoja!', [
                    '@user' => $field_input
                ]);
                return false;
            }
        }
    }

    return true;
}

$form = [
    'fields' => [
        'user_name' => [
            'label' => 'Username',
            'type' => 'text',
            'placeholder' => 'Lopas123',
            'validate' => [
                'validate_not_empty',
                'validate_username'
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
            'text' => 'Registruotis!'
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

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);

    if ($form_success) {
        $success_msg = strtr('Team`as "@user_name" sėkmingai sukurtas!', [
            '@user_name' => $safe_input['user_name']
        ]);
        $show_form = false;
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>PZ2ABALL | Create Team</title>
    </head>
    <body>
        <!-- Navigation -->    
        <?php require 'objects/navigation.php'; ?>        

        <!-- Content -->    
        <h1>Register!</h1>

        <?php if ($show_form): ?>
            <!-- Form -->        
            <?php require 'objects/form.php'; ?>
        <?php else: ?>
            <h2>Zašibys!</h2>
            <h3><?php print $success_msg; ?></h3>
        <?php endif; ?>
    </body>
</html>