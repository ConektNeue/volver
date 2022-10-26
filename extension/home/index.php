<?php

date_default_timezone_set('Europe/Paris');

if (!session_id()) {
    session_start();
}

if ($_SESSION["logged"] != true) {
    header("Location: ../../index.php?extension=true");
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
    <title>Extension Volver</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="ui-controller" data-username="<?php echo $_SESSION["username"]; ?>">

        <div class="toolbar">
            <div id="btn-close-second">
                <svg width="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d=" M12 10.6811L7.11455 5.80495L11.6006 1.31889L10.291 0L5.80495 4.48607L1.31889 0L0 1.31889L4.48607 5.80495L0 10.291L1.31889 11.6006L5.80495 7.11455L10.6811 12L12 10.6811Z">
                    </path>
                </svg>
                <!-- Retour -->
            </div>
            <div class="right">
                <div class="right-btn" id="btnCreateNews">
                    <svg width="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 5.65802H8.34205V0H5.65812V5.65802H0V8.34198H5.65812V14H8.34205V8.34198H14V5.65802Z">
                        </path>
                    </svg>
                </div>
                <div class="right-btn" id="btnOpenContextpanel">
                    <svg style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Le fil des posts = page d'accueil -->
        <div class="content">
            <div class="news">
                <div class="header">
                    <div class="avatar"></div>
                    <div class="right">
                        <div class="author">ConektNeue</div>
                        <div class="date">22 janvier 2022</div>
                    </div>
                </div>
                <div class="content">
                    Il y a un kmgg en Amérique du Nord à proximité du point de spawn, c'est
                    stonement : il comprend la contrabase et un champ détruit à la TNT. Il y en a un
                    second en Amérique du Sud près du point de spawn, c'est lollipop, un endroit géant en
                    construction qui sera l'unique base de l'Union.
                </div>
                <img src="https://i.ytimg.com/vi/_sWYGycsXpE/maxresdefault.jpg">
            </div>
            <div class="news">
                <div class="header">
                    <div class="avatar"></div>
                    <div class="right">
                        <div class="author">ConektNeue</div>
                        <div class="date">22 janvier 2022</div>
                    </div>
                </div>
                <div class="content">
                    Il y a un kmgg en Amérique du Nord à proximité du point de spawn, c'est
                    stonement : il comprend la contrabase et un champ détruit à la TNT. Il y en a un
                    second en Amérique du Sud près du point de spawn, c'est lollipop, un endroit géant en
                    construction qui sera l'unique base de l'Union.
                </div>
                <img src="https://i.ytimg.com/vi/_sWYGycsXpE/maxresdefault.jpg">
            </div>
            <div class="news">
                <div class="header">
                    <div class="avatar"></div>
                    <div class="right">
                        <div class="author">ConektNeue</div>
                        <div class="date">22 janvier 2022</div>
                    </div>
                </div>
                <div class="content">
                    Il y a un kmgg en Amérique du Nord à proximité du point de spawn, c'est
                    stonement : il comprend la contrabase et un champ détruit à la TNT. Il y en a un
                    second en Amérique du Sud près du point de spawn, c'est lollipop, un endroit géant en
                    construction qui sera l'unique base de l'Union.
                </div>
                <img src="https://i.ytimg.com/vi/_sWYGycsXpE/maxresdefault.jpg">
            </div>
        </div>

    </div>

    <script src="./home.js"></script>
</body>

</html>