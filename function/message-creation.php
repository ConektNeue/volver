<?php

date_default_timezone_set('Europe/Paris');

if (!session_id()) {
    session_start();
}

if ($_SESSION["logged"] == true) {
    if (!empty($_POST["messageContent"])) {
        $currentMessageContent = $_POST["messageContent"];

        $messagesUrl = "../database/message.json";
        $messagesContent = file_get_contents($messagesUrl);
        $messages = json_decode($messagesContent, true);

        $currentMessagesNumber = count($messages);

        for ($i = 0; $i < count($messages); $i++) {
            $messages[$i]["id"] = "msg-id-" . $i;
        }

        $messages[] = ["username" => $_SESSION["username"], "avatar_url" => "", 'content' => htmlspecialchars($currentMessageContent), 'time' => date("H:i d.m.Y"), 'id' => "msg-id-" . $currentMessagesNumber];
        $messagesEncoded = json_encode($messages);
        file_put_contents($messagesUrl, $messagesEncoded);

        $messagesModifContent = file_get_contents("../database/message-modif.txt");
        $messagesModifContent = $messagesModifContent + 1;
        file_put_contents("../database/message-modif.txt", $messagesModifContent);
    }
}
