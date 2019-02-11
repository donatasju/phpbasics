<?php
$input = filter_input_array(INPUT_POST, [
    'vardas' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);
?>
<html>
    <head>
        <title>Hack me</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <h1><?php print $input['vardas'] ?? ''; ?></h1>
        <h2>Hack this page</h2>
        <form method="POST">
            <input type="text" name="vardas">
            <input type="submit">
        </form>
    </body>
</html>