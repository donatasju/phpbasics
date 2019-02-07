<?php
$file = $_FILES['file'] ?? false;
$dir = 'uploads';

function save_file($file, $dir) {
    if ($file['error'] == 0) {
        $target_file_name = time() . '-' . $file['name'];
        $target_path = $dir . '/' . $target_file_name;

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return true;
        }
        return false;
    }
}

if (!empty($file)) {
    save_file($file, $dir);
}
?>
<html>
    <head>
        <title>Formos</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST">
            Tavo foto:<input name="file" type="file">
            <input type="submit" value="upload">
        </form>
    </body>
</html>