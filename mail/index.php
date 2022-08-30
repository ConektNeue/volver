<?php

date_default_timezone_set('Europe/Paris');

if (!session_id()) {
    session_start();
}

if ($_SESSION["logged"] != true) {
    header("Location: ../index.php");
} else {
    $_SESSION["userPage"] = "home";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>

<body>

    <div class="ui-controller" data-username="<?php echo $_SESSION["username"]; ?>">
    </div>

</body>

</html>