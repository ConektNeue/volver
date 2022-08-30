<div class="ui-controller" id="uicont">
    <div class="msg-box">
        <?php
        $messagesUrl = "../../database/message.json";
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
                echo "<div class='msg-global-container " . $side . "' data-msg-name='" . $messages[$i]['username'] . "' data-msg-id='" . $messages[$i]['id'] . "' data-long-press-delay='750'><div class='avatar-container'><div style='background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/694px-Unknown_person.jpg);'></div></div><div class='msg " . $side . "'><div class='user'><p class='username'>" . $messages[$i]['username'] . "</p><p class='time'>" . $messages[$i]['time'] . "</p></div><div class='content'>" . $messages[$i]['content'] . " </div></div></div>";
                echo "<div class='msg-global-container-separator'></div>";
            }
        }
        ?>
    </div>
    <div class="txt-box">
        <div class="textarea-container">
            <textarea name="textarea" id="textarea" placeholder="Écrivez un message" onfocus="textBoxFocus();" onblur="textBoxBlur();"></textarea>
            <div class="btn-send" onclick="btnSendTextarea(document.getElementById('textarea').value);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                </svg></div>
        </div>
    </div>
</div>