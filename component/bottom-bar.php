<div class='bottom-bar'>
    <div class='item <?php if ($_GET["userPageInSession"] == "home") {
                            echo "active";
                        } ?>'>
        <div class='icon'>
            <img src="../icon/icons8-home-page-48.png">
        </div>
    </div>
    <div class='item <?php if ($_GET["userPageInSession"] == "people") {
                            echo "active";
                        } ?>' onclick="location.href= './page/people/index.php';">
        <div class='icon'>
            <img src="../icon/icons8-people-48.png">
        </div>
    </div>
    <div class='item <?php if ($_GET["userPageInSession"] == "settings") {
                            echo "active";
                        } ?>' onclick="location.href= './page/settings/index.php';">
        <div class='icon'>
            <img src="../icon/icons8-settings-48.png">
        </div>
    </div>
</div>