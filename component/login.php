<div class="login-box">
    <form action="./index.php" method="GET">
        <input class="input-text" id="loginUsername" type="text" name="username" placeholder="Identifiant" required>
        <input class="input-text" id="loginPassword" type="password" name="password" placeholder="Mot de passe" required>
        <input class="input-submit" id="loginSubmitBtn" type="submit" name="Connexion" value="Connexion">
        <input class="input-submit" id="signinSubmitBtn" type="submit" name="Inscription" value="Inscription">
        <?php
        if ($_GET["error"] == "login") {
            echo "<p class='incorrects-ids'>Identifiants incorrects</p>";
        } elseif ($_GET["error"] == "signin") {
            echo "<p class='incorrects-ids'>Identifiant déjà pris</p>";
        }
        ?>
    </form>
</div>