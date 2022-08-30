<?php

date_default_timezone_set('Europe/Paris');

session_start();

if ($_SESSION['logged'] == true) {
    header("Location: ./user/home/");
}

if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST["Connexion"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $accountUrl = "./database/account-zgizrnb.json";
    $accountContent = file_get_contents($accountUrl);
    $account = json_decode($accountContent, true);

    $loggedIn = false;
    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]["username"] == $username && $account[$i]["authentifiant"] == $password) {
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            header("Location: ./user/home/");
            $loggedIn = true;
        }
    }

    if ($_SESSION['logged'] != true) {
        header("Location: ./index.php?error=login");
    }
} elseif (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST["Inscription"])) {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $accountUrl = "./database/account-zgizrnb.json";
    $accountContent = file_get_contents($accountUrl);
    $account = json_decode($accountContent, true);

    $usernameAlreadyExist = false;
    for ($i = 0; $i < count($account); $i++) {
        if ($account[$i]["username"] == $username) {
            $usernameAlreadyExist = true;
        }
    }

    if ($usernameAlreadyExist) {
        header("Location: ./index.php?error=signin");
    } else {
        $account[] = ["username" => $username, "authentifiant" => $password];
        $accountEncoded = json_encode($account);
        file_put_contents($accountUrl, $accountEncoded);

        $_SESSION["logged"] = true;
        $_SESSION["username"] = $username;
        header("Location: ./user/home/");
    }
}

// if ($loggedIn && !empty($_REQUEST["erasemsg"])) {
//     $msgIds = $_REQUEST["erasemsg"];

//     if (str_contains($msgIds, ',')) {
//         $msgIds = explode(',', $msgIds);
//     } else {
//         $msgIds = [$msgIds];
//     }

//     $messagesUrl = "./database/message.json";
//     $messagesContent = file_get_contents($messagesUrl);
//     $messages = json_decode($messagesContent, true);

//     for ($i = count($messages); $i > 0; $i--) {
//         if ($messages[$i]["username"] == $username) {
//             for ($j = 0; $j < count($msgIds); $j++) {
//                 if ($msgIds[$j] == $messages[$i]["id"]) {
//                     unset($messages[$i]);
//                 }
//             }
//         }
//     }
//     $messages = array_values($messages);
//     $messagesEncoded = json_encode($messages);
//     file_put_contents($messagesUrl, $messagesEncoded);

//     if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
//         $url = "https://";
//     else
//         $url = "http://";

//     $url .= $_SERVER['HTTP_HOST'];
//     $url .= $_SERVER['REQUEST_URI'];
//     $url = strtok($url, '?');
//     $url .= "?username=$username&password=$password&Connexion=Submit&userPageInSession=home";

//     function redirect($url, $statusCode = 303)
//     {
//         header('Location: ' . $url, true, $statusCode);
//     }
//     Redirect($url);
// }

// if (!empty($_REQUEST["function"])) {
//     $function = $_REQUEST["function"];
//     if ($function == "deletemsg") {
//         $messagesUrl = "./database/message.json";
//         $messagesContent = file_get_contents($messagesUrl);
//         $messages = json_decode($messagesContent, true);

//         for ($i = count($messages); $i > 0; $i--) {
//             if ($messages[$i]["username"] == $username) {
//                 unset($messages[$i]);
//             }
//         }
//         $messages = array_values($messages);
//         $messagesEncoded = json_encode($messages);
//         file_put_contents($messagesUrl, $messagesEncoded);
//     } else if ($function == "deleteacc") {

//         $accountUrl = "./database/account.json";
//         $accountContent = file_get_contents($accountUrl);
//         $account = json_decode($accountContent, true);

//         for ($i = count($account); $i > 0; $i--) {
//             if ($account[$i]["username"] == $username) {
//                 unset($account[$i]);
//             }
//         }
//         $account = array_values($account);
//         $accountEncoded = json_encode($account);
//         file_put_contents($accountUrl, $accountEncoded);

//         $url = null;
//         if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
//             $url = "https://";
//         else
//             $url = "http://";

//         $url .= $_SERVER['HTTP_HOST'];
//         $url .= $_SERVER['REQUEST_URI'];
//         $url = strtok($url, '?');

//         function redirect($url, $statusCode = 303)
//         {
//             header('Location: ' . $url, true, $statusCode);
//         }
//         Redirect($url);
//     }
// }

// if (!empty($_REQUEST["msgcontent"])) {
//     $msg_content = $_REQUEST["msgcontent"];

//     $messagesUrl = "./database/message.json";
//     $messagesContent = file_get_contents($messagesUrl);
//     $messages = json_decode($messagesContent, true);

//     $messages[] = ["username" => $username, "avatar_url" => $avatarUrl, 'content' => htmlspecialchars($_REQUEST["msgcontent"]), 'time' => date("H:i d.m.Y"), 'id' => "msg-id-" . count($messages)];
//     $messagesEncoded = json_encode($messages);
//     file_put_contents($messagesUrl, $messagesEncoded);

//     if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
//         $url = "https://";
//     else
//         $url = "http://";

//     $url .= $_SERVER['HTTP_HOST'];
//     $url .= $_SERVER['REQUEST_URI'];
//     $url = strtok($url, '?');
//     $url .= "?username=$username&password=$password&Connexion=Submit&userPageInSession=home";

//     function redirect($url, $statusCode = 303)
//     {
//         header('Location: ' . $url, true, $statusCode);
//     }
//     Redirect($url);
// }
// } elseif (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST["Inscription"])) {
//     $username = $_REQUEST["username"];
//     $password = $_REQUEST["password"];

//     $accountUrl = "./database/account.json";
//     $accountContent = file_get_contents($accountUrl);
//     $account = json_decode($accountContent, true);

//     for ($i = 0; $i < count($account); $i++) {
//         if ($account[$i]["username"] == $username) {
//             exit("Ce nom d'utilisateur est déjà utilisé");
//         }
//     }

// $account[] = ["username" => $username, "authentifiant" => $password];
// $accountEncoded = json_encode($account);
// file_put_contents($accountUrl, $accountEncoded);

// $url = null;
// if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
//     $url = "https://";
// else
// $url = "http://";

// $url .= $_SERVER['HTTP_HOST'];
// $url .= $_SERVER['REQUEST_URI'];
// $url = strtok($url, '?');
// $url .= "?username=$username&password=$password&chooseAvatar=Submit";

// function redirect($url, $statusCode = 303)
// {
//     header('Location: ' . $url, true, $statusCode);
// }
// Redirect($url);
// } elseif (!empty($_REQUEST["username"]) && !empty($_REQUEST["chooseAvatar"])) {
//     $username = $_REQUEST["username"];
//     $chooseAvatar = true;
// } else {
//     $loggedIn = false;
// }

// if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST["accountAvatarUrl"]) && !empty($_REQUEST["chooseAvatar"])) {
// $username = $_REQUEST["username"];
// $password = $_REQUEST["password"];
// $accountAvatarUrl = $_REQUEST["accountAvatarUrl"];

// $accountUrl = "./database/account.json";
// $accountContent = file_get_contents($accountUrl);
// $account = json_decode($accountContent, true);

// $accountDouble = false;
// for ($i = 0; $i < count($account); $i++) {
//     if ($account[$i]["username"] == $username) {
//         $accountDouble = true;
//     }
// }

//     if ($accountDouble == true) {
//         exit("Ce nom d'utilisateur est déjà utilisé");
//     }

//     if ($accountAvatarUrl == 'default' || $accountAvatarUrl == 'undefined') {
//         $account[] = ["username" => $username, "authentifiant" => $password, "avatar_url" => "./img/yavatar.png"];
//         $accountEncoded = json_encode($account);
//         file_put_contents($accountUrl, $accountEncoded);
//     } else {
//         // file_put_contents("./img/$username-logo.png", $accountAvatarUrl);
//         $account[] = ["username" => $username, "authentifiant" => $password, "avatar_url" => "../img/yavatar.png"];
//         $accountEncoded = json_encode($account);
//         file_put_contents($accountUrl, $accountEncoded);
//     }

//     $url = null;
//     if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
//         $url = "https://";
//     else
//         $url = "http://";

//     $url .= $_SERVER['HTTP_HOST'];
//     $url .= $_SERVER['REQUEST_URI'];
//     $url = strtok($url, '?');
//     $url .= "?username=$username&password=$password&Connexion=Submit&userPageInSession=home";

//     function redirect($url, $statusCode = 303)
//     {
//         header('Location: ' . $url, true, $statusCode);
//     }
//     Redirect($url);
// }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Local</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
</head>

<body>

    <div class="undef"></div>
    <div class="current-username" id="<?php echo $username; ?>"></div>

    <div class="ui-controller">
        <?php
        if ($chooseAvatar) {
            require "./component/choose-avatar.php";
            echo '<script src="./choose-avatar.js"></script>';
        } else {
            require "./component/login.php";
        }
        ?>
    </div>
    <!-- <script src="./script.js"></script> -->
</body>

</html>