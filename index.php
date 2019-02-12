<?php
$form = [
    'input' => [
        'name' => [
            'text' => 'Mano vardas',
            'type' => 'text',
            'placeholder' => 'Vardas',
        ],
        'zirniai' => [
            'text' => 'Kiek turiu zirniu ?',
            'type' => 'text',
            'placeholder' => '1-100',
        ],
        'reason' => [
            'text' => 'Paslaptis, kodel turiu zirniu',
            'type' => 'password',
            'placeholder' => 'Issipasakok',
        ]
    ],
    'button' => [
        'do_zirniai' => [
            'text' => 'Paberti...',
        ]
    ]
];

function get_safe_input($form) {
    $filter_param = [];
    
    foreach ($form['input'] as $key => $value) {
        $filter_param[$key] = FILTER_SANITIZE_SPECIAL_CHARS;
    }
    
    $filter_param['action'] = FILTER_SANITIZE_SPECIAL_CHARS;
    
    return filter_input_array(INPUT_POST, $filter_param);
}

$safe_array = get_safe_input($form);

function validate_not_empty($input, &$forma) {
        foreach($forma['input'] as $input_id => &$value) {
            if($input[$input_id] == '') {
                $value['error_msg'] = strtr('Krw duhe neirasei nieko.' . ' Palikai @value tuscia.', ['@value' => $value['text']]);
            }
        }
        
        return $forma; 
};

if(!empty($_POST)) {
    $safe_array = get_safe_input($form);
    validate_not_empty($safe_array, $form);
}
?>
<html>
    <head>
        <title>Hack Me</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <h1></h1>
        <h2>Hack this page</h2>
        <form method="POST">
            <?php foreach ($form['input'] as $input_key => $input): ?>
                <label>
                    <span><?php print $input['text']; ?></span>
                    <input type="<?php print $input['type']; ?>" name="<?php print $input_key; ?>" placeholder="<?php print $input['placeholder']; ?>">
                        <?php if (isset($input['error_msg'])): ?>
                            <span><?php print $input['error_msg']; ?></span><br>
                        <?php endif; ?>
                </label>
            <?php endforeach; ?>
            <?php foreach ($form['button'] as $button_key => $button): ?>
                <button name="action" value="<?php print $button_key; ?>"><?php print $button['text']; ?></button>
            <?php endforeach; ?>
        </form>
    </body>
</html>
