<?php
require_once 'bootstrap.php';

session_start();

if (file_exists(STORAGE_FILE)) {
    $team_idx = $_SESSION['team'] ?? false;
    $nick = $_SESSION['nick'] ?? false;
    $teams_array = file_to_array(STORAGE_FILE);

    if (!empty($_SESSION)) {
        foreach ($teams_array[$team_idx]['players'] as $player) {
            $individual_score = 0;

            if ($player['nick_name'] == $nick) {
                $individual_score = $player['score'];
                break;
            }
        }
    }

    foreach ($teams_array as &$team) {
        $team['team_score'] = 0;
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
            <p><?php print 'Komandos pavadinimas: ' . $team['team_name']; ?></p>
            <p><?php print 'Komandos score: ' . $team['team_score']; ?></p>
        <?php endforeach; ?>
        <?php if (!empty($_SESSION)): ?>
            <h3>Zaidejo duomenys:</h3>
            <p><?php print 'Tavo nick: ' . $nick ?></p>
            <p><?php print 'Tavo individual score: ' . $individual_score; ?></p>
        <?php endif; ?>
    </body>
</html>