<div class="box row g-0 h-100">
    <div class="underbox col-md-7 d-flex flex-center">
        <div class="underbox p-4 p-md-5 flex-grow-1">
            <div class="row flex-between-center">
                <div class="col-auto">
                    <h5>Connexion</h5>
                </div>
            </div>
            <form action="./index.php" method="get">
                <div class="mb-3"><input class="form-control" id="card-email" type="text" placeholder="Identifiant" name="username" required></div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between"></div><input class="form-control" id="card-password" type="password" placeholder="Mot de passe" name="password" required>
                </div>
                <div class="row flex-between-center">
                    <div class="col-auto">
                        <!-- <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="card-checkbox" checked="checked"><label class="form-check-label mb-0" for="card-checkbox">Remember me</label></div> -->
                    </div>
                </div>
                <label for="Connexion">Connexion</label>
                <div class="mb-3 big-btn"><input class="btn btn-primary d-block w-100 mt-3 btn-submit" type="submit" name="Connexion"></input></div>
                <label for="Inscription">Inscription</label>
                <div class="mb-3 big-btn"><input class="btn btn-primary d-block w-100 mt-3 btn-submit" type="submit" name="Inscription"></input></div>
                <?php
                    if ($_GET["error"] == "login") {
                        echo "<p class='incorrects-ids'>Identifiants incorrects</p>";
                    } elseif ($_GET["error"] == "signin") {
                        echo "<p class='incorrects-ids'>Identifiant déjà pris</p>";
                    }
                ?>
            </form>
            <!-- <div class="position-relative mt-4">
                        <hr class="bg-300">
                        <div class="divider-content-center">or log in with</div>
                    </div> -->
        </div>
    </div>
</div>