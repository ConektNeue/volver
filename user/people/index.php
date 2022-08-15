<?php

date_default_timezone_set('Europe/Paris');

$loggedIn = false;

if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $accountUrl = "../../database/account.json";
    $accountContent = file_get_contents($accountUrl);
    $account = json_decode($accountContent, true);

    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]["username"] == $username && $account[$i]["authentifiant"] == $password) {
            $loggedIn = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Local</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="ui-controller">
        <?php
        if ($loggedIn) {
            require "./component/people-list.php";
            require "./component/bottom-bar.php";
            echo '<script src="./people-list.js"></script>';
        } else {
            header("Location: ../../index.php");
        }
        ?>
    </div>

</body>

</html>