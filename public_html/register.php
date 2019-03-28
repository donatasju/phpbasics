<?php
require '../bootloader.php';

define('USERS', 'input_users');

$form = [
    'fields' => [
        'username' => [
            'label' => 'Username',
            'type' => 'text',
            'placeholder' => 'Your username',
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'email' => [
            'label' => 'Email',
            'type' => 'text',
            'placeholder' => 'Your email',
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'full_name' => [
            'label' => 'Full name',
            'type' => 'text',
            'placeholder' => 'Your full name',
            'validate' => [
                'validate_not_empty',
            ],
        ],
        'age' => [
            'label' => 'Age',
            'type' => 'number',
            'placeholder' => 'Your age',
            'validate' => [
                'validate_not_empty',
                'validate_is_number'
            ],
        ],
        'gender' => [
            'label' => 'Your gender',
            'type' => 'select',
            'placeholder' => 'Your gender',
            'validate' => [
                'validate_not_empty',
            ],
            'options' => \App\User::getGenderOptions()
        ],
        'orientation' => [
            'label' => 'Orientation',
            'type' => 'select',
            'placeholder' => 'Your orientation',
            'validate' => [
                'validate_not_empty',
            ],
            'options' => \App\User::getOrientationOptions()
        ],
        'photo' => [
            'label' => 'Photo',
            'type' => 'file',
            'placeholder' => 'Your photo',
            'validate' => [
                'validate_file',
            ],
        ]
    ],
    'validate' => [
        'validate_form_file'
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Submit'
        ]
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ]
];

function validate_form_file(&$safe_input, &$form) {
    $file_saved_url = save_file($safe_input['photo']);
    if ($file_saved_url) {
        $safe_input['photo'] = 'uploads/' . $file_saved_url;
        return true;
    } else {
        $form['error_msg'] = 'Jobans/a tu buhurs/gazele nes failas supistas!';
    }
}

function form_success($safe_input, $form) {
    $user = new \App\User([
        'username' => $safe_input['username'],
        'email' => $safe_input['email'],
        'full_name' => $safe_input['full_name'],
        'age' => $safe_input['age'],
        'gender' => $safe_input['gender'],
        'orientation' => $safe_input['orientation'],
        'photo' => $safe_input['photo']
    ]);

    $db = new Core\FileDB(ROOT_DIR . '/app/files/db.txt');
    $model_user = new App\Model\ModelUser($db, 'USERS');
    $model_user->insert(microtime(), $user);
}

function save_file($file, $dir = 'uploads', $allowed_types = ['image/png', 'image/jpeg']) {
    if ($file['error'] == 0 && in_array($file['type'], $allowed_types)) {
        $target_file_name = microtime() . '-' . strtolower($file['name']);
        $target_path = $dir . '/' . $target_file_name;
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_file_name;
        }
    }
    return false;
}

$success_msg = '';
if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);
    if ($form_success) {
        $success_msg = strtr('Useris "@username" sėkmingai sukurtas!', [
            '@username' => $safe_input['username']
        ]);
    }
}

$db = new Core\FileDB(ROOT_DIR . '/app/files/db.txt');
$model_users = new App\Model\ModelUser($db, 'USERS');

?>
<html>
    <head>
        <title>OOP user</title>
    </head>
    <body>
        <?php require '../core/views/form.php'; ?>
            <h3><?php print $success_msg; ?></h3>
        <?php foreach ($model_users->loadAll() as $user): ?>
            <div>
                <h2>Username: <?php print $user->getUsername(); ?></h2>
                <p>Email: <?php print $user->getEmail(); ?></p>
                <p>Fullname: <?php print $user->getFullName(); ?></p>
                <p>Age: <?php print $user->getAge(); ?></p>
                <p>Gender: <?php print $user->getGender(); ?></p>
                <p>Orientation: <?php print $user->getOrientation(); ?></p>
                <img src="<?php print $user->getPhoto(); ?>">
            </div>
        <?php endforeach; ?>
    </body>
</html>
