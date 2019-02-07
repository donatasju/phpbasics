<?php
$dir = 'uploaded/photos';
$file = $_FILES['photo'] ?? false;
var_dump($file);
function save_file($file, $dir) {
    if ($file['error'] == 0) {
        $target_fname = time() . ' ' . $file['name'];
        $target_path = $dir . '/' . $target_fname;
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            
            return true;
        }
    }

    return true;
}

if (!empty($_FILES)) {
    save_file($file, $dir);
}
?>

<html>
    <head>
        <title>Files</title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST">
            Tavo foto: <input name="photo" type="file">
            <input type="submit" value="Gauti rezultata">
        </form>
    </body>
</html>
