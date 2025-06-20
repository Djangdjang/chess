<?php
// On récupère le plateau envoyé par le client
if (isset($_POST['boardState'])) {
    $boardState = $_POST['boardState'];
    // On sauve dans un fichier JSON
    file_put_contents('game_state.json', $boardState);
    echo 'OK';
} else {
    echo 'No data';
}
?>
