<?php
header('Content-Type: application/json');
$filename = 'game_state.json';

// Long polling simple : on attend jusqu'à 20 sec max qu'il y ait un changement
$start = time();
$lastState = file_exists($filename) ? file_get_contents($filename) : json_encode(array_fill(0,8, array_fill(0,8,"")));

while (true) {
    clearstatcache();
    $currentState = file_exists($filename) ? file_get_contents($filename) : $lastState;
    if ($currentState !== $lastState) {
        echo $currentState;
        break;
    }
    if ((time() - $start) > 20) {
        // Timeout, renvoyer l'état actuel même s'il n'a pas changé
        echo $lastState;
        break;
    }
    usleep(500000); // 0.5 seconde
}
?>
