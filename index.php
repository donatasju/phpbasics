<?php
$array = [
    'input' => [
        'name' =>
        [
            'type' => 'text',
            'placeholder' => 'Vardas',
            'label' => 'Mano Vardas'
        ],
        'zirniai' =>
        [
            'type' => 'text',
            'placeholder' => '1-100',
            'label' => 'Kiek turiu zirniu?'
        ],
        'reason' =>
        [
            'placeholder' => 'issipasakok',
            'label' => 'Paslaptis',
            'type' => 'password',
        ],
    ],
    'button' => [
        'do_zirniai' =>
        [
            'label' => 'paberti'
        ]
    ]
];
function get_safe_input($form){
    $input = filter_input_array(INPUT_POST,[
        'name' => FILTER_SANITIZE_SPECIAL_CHARS,
        'zirniai' => FILTER_SANITIZE_SPECIAL_CHARS,
        'reason' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);
    return $input;
}

var_dump(get_safe_input($_POST));

?>
<html>
    <head>
        <title>Forma is array</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form method="POST">
            <?php foreach ($array['input'] as $input_index => $input): ?>
                <label>
                    <span><?php print $input['label']; ?></span>
                    <input type="<?php print $input['type']; ?>" 
                           name="<?php print $input_index; ?>" 
                           placeholder="<?php print $input['placeholder']; ?>">
                </label>
            <?php endforeach; ?>
            <?php foreach ($array['button'] as $key => $value): ?>
                <button
                    name="action" 
                    value="<?php print $key; ?>">
                        <?php print $value['label']; ?>
                </button>
            <?php endforeach; ?>
        </form>
    </body>
</html>