<?php
require_once 'bootstrap.php';


if (file_exists(STORAGE_FILE)) {
    $teams_array = file_to_array(STORAGE_FILE);
    foreach ($teams_array as &$team) {
        $team['team_score'] = 0;
        var_dump($team['team_name']);
        foreach ($team['players'] as $player) {
            $team['team_score'] += $player['score'];
        }
    }
    unset($team);
    array_to_file($teams_array, STORAGE_FILE);
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
        <h1>PZDABALL Scoreboard!</h1>
        <?php foreach ($teams_array as $team): ?>
            <p><?php print $team['team_name']; ?></p>
            <p><?php print $team['team_score']; ?></p>
        <?php endforeach; ?>
    </body>
</html>