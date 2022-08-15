<div class="ui-controller" id="uicont">
    <!-- <div class="navbar">
        <div class="btnnav btnnav-user btn-logout" onclick="location.href = './index.php';">Déconnexion</div>
        <div class="btnnav btnnav-user btn-member-list" onclick="memberlistToggle();">Membres</div>
        <div class="btnnav btnnav-user" onclick="deleteacc();">Effacer le compte</div>
        <div class="btnnav btnnav-msg btnnav-cancel-msg" onclick="cancelMsgBtnnav();">Annuler</div>
        <div class="btnnav btnnav-msg btnnav-erase-msg" onclick="eraseMsgBtnnav();">Effacer</div>
    </div>
    <div id="memberList">
        <?php
        $accountUrl = "./database/account.json";
        $accountContent = file_get_contents($accountUrl);
        $account = json_decode($accountContent, true);

        for ($i = 0; $i < count($account); $i++) {
            if ($account[$i]["username"] == $_SESSION["username"]) {
                echo "<div class='item right'>" . $account[$i]["username"] . "</div>";
            } else {
                echo "<div class='item'>" . $account[$i]["username"] . "</div>";
            }
        }
        ?>
    </div> -->
    <div class="msg-box">
        <?php
        $messagesUrl = "./database/message.json";
        $messagesContent = file_get_contents($messagesUrl);
        $messages = json_decode($messagesContent, true);

        clearstatcache();
        if (filesize($messagesUrl)) {
            $msgNumber = count($messages);
            for ($i = count($messages) - 1; $i > -1; $i--) {
                if ($messages[$i]["username"] == $_SESSION["username"]) {
                    $side = "right";
                } else {
                    $side = "left";
                };
                // echo "<div class='msg-item'><div class='img' style='background-image: url(https://cdn.discordapp.com/avatars/729979764445675538/746a206da383de40bb016fbf42ac8273.webp)'></div><p class='username'><span class='name'>ConektNeue</span><img src='../img/star-filled.png'><span class='time'>Hier à 19H</span></p><p class='content'><img src='https://media.discordapp.net/attachments/973257011594678272/973654639591448576/aha.jpg'></p></div>";
                echo "<div class='msg-global-container " . $side . "' data-msg-name='" . $messages[$i]['username'] . "' data-msg-id='" . $messages[$i]['id'] . "' data-long-press-delay='750'><div class='avatar-container'><div style='background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/694px-Unknown_person.jpg);'></div></div><div class='msg " . $side . "'><div class='user'><p class='username'>" . $messages[$i]['username'] . "</p><p class='time'>" . $messages[$i]['time'] . "</p></div><div class='content'>" . $messages[$i]['content'] . " </div></div></div>";
                echo "<div class='msg-global-container-separator'></div>";
                // for ($j = 0; $j < count($accounts[$i]["groups"]); $j++) {
                //     $fileName = $accounts[$i]["groups"][$j]['file_group_title'];

                //     $currentGroupMetadataUrl = "../groups/$fileName/metadata.json";
                //     $currentGroupeMetadataContent = file_get_contents($currentGroupMetadataUrl);
                //     $currentGroupeMetadata = json_decode($currentGroupeMetadataContent, true);

                //     $menuBarContent[] = $currentGroupeMetadata["title"];
                // }
            }
        }
        ?>
    </div>
    <div class="txt-box">
        <div class="textarea-container">
            <textarea name="textarea" id="textarea" placeholder="Message"></textarea>
        </div>
        <div class="btn-send" onclick="location.href = (window.location.protocol + `\/\/` + window.location.host + `\/` + window.location.pathname + window.location.search + `&msgcontent=${textarea.value}`)">Envoyer</div>
    </div>
</div>