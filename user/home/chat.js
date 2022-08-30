let username = document.querySelector('.ui-controller').getAttribute('data-username');

let messageGeneralModif = null;
let secondMessageGeneralModif = null;
let messageGeneralModifUrl = '../../database/message-modif.txt';

messageGeneralModifRequest(messageGeneralModifUrl, "all");

function messageGeneralModifRequest(url, messageSelection) {
    let props = 'bank';
    let request = new XMLHttpRequest();
    request.open('GET', url);
    request.responseType = 'text';
    request.send();

    request.onload = function () {
        jsonData = request.response;
        if (messageSelection == "all") {
            messageGeneralModif = jsonData;
            secondMessageGeneralModif = jsonData;
        } else if (messageSelection == "second") {
            secondMessageGeneralModif = jsonData;
        }
        console.log(messageGeneralModif);
    }
}

setInterval(() => {
    messageGeneralModifRequest(messageGeneralModifUrl, "second");
    if (messageGeneralModif != secondMessageGeneralModif) {
        console.log("messageGeneralModif " + messageGeneralModif + " != secondMessageGeneralModif " + secondMessageGeneralModif);
        reinitializeChat();
        messageGeneralModif = secondMessageGeneralModif;
    }
}, 500);

function btnSendTextarea(messageContent) {
    const xhr = new XMLHttpRequest();

    // configure a `POST` request
    xhr.open('POST', '../../function/message-creation.php');

    // prepare form data
    let params = 'messageContent=' + messageContent;

    // set `Content-Type` header
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // pass `params` to `send()` method
    xhr.send(params);

    // listen for `load` event
    xhr.onload = () => {
        console.log(xhr.responseText);
    }
    document.getElementById('textarea').value = '';
}

function reinitializeChat() {
    let msgBox = document.querySelector('.msg-box');
    document.querySelectorAll('.msg-box > div').forEach(element => {
        element.remove();
    });
    // msgBox.style.flexDirection = 'column';
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../database/message.json');
    xhr.responseType = 'json';
    xhr.send();
    xhr.onload = () => {
        const messages = xhr.response;
        messages.reverse().forEach(function(message, index) {
            let side = 'left';
            if (message.username == username) {
                side = 'right';
            }
            let messageFromSameUser = false;
            if (index != 0) {
                if (typeof(String(messages[index]['username'])) === typeof(String(messages[index--]['username']))) {
                    console.log('username : [' + typeof(String(message['username'])) + '] \n previous : [' + typeof(String(messages[index--]['username'])) + ']');
                    messageFromSameUser = true;
                }
            }
            let msgGlobalContainer = document.createElement('div');
            msgGlobalContainer.classList.add('msg-global-container');
            msgGlobalContainer.classList.add(side);
            msgBox.appendChild(msgGlobalContainer);
            let avatarContainer = document.createElement('div');
            avatarContainer.classList.add('avatar-container');
            msgGlobalContainer.appendChild(avatarContainer);
            let avatar = document.createElement('div');
            avatar.style.backgroundImage = 'url(https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/694px-Unknown_person.jpg)';
            avatarContainer.appendChild(avatar);
            let msg = document.createElement('div');
            msg.classList.add('msg');
            msg.classList.add(side);
            if (messageFromSameUser === true) {
                msg.classList.add('msg-from-same-user');
            }
            msgGlobalContainer.appendChild(msg);
            let user = document.createElement('div');
            user.classList.add('user');
            msg.appendChild(user);
            let userName = document.createElement('p');
            userName.classList.add('username');
            userName.textContent = message.username;
            user.appendChild(userName);
            let time = document.createElement('p');
            time.classList.add('time');
            time.textContent = message.time;
            user.appendChild(time);
            let msgContent = document.createElement('div');
            msgContent.classList.add('content');
            msgContent.textContent = message.content;
            msg.appendChild(msgContent);
            let msgGlobalContainerSeparator = document.createElement('div');
            msgGlobalContainerSeparator.classList.add('msg-global-container-separator');
            msgBox.appendChild(msgGlobalContainerSeparator);
        }
        );
    }
}

function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function (m) { return map[m]; });
}

function textBoxFocus() {
    document.querySelector('.txt-box').style.transform = 'translateY(55px)';
    // document.querySelector('.msg-box').style.transform = 'translateY(55px)';
    document.querySelector('.msg-box').style.height = 'calc(' + document.querySelector('.msg-box').getBoundingClientRect().height + 'px + 56px)';
    document.querySelector('.bottom-bar').style.display = 'none';
}

function textBoxBlur() {
    setTimeout(() => {
        document.querySelector('.txt-box').style.transform = 'translateY(0)';
        document.querySelector('.msg-box').style.transform = 'translateY(0)';
        document.querySelector('.msg-box').style.height = 'calc(' + document.querySelector('.msg-box').getBoundingClientRect().height + 'px - 56px)';
        document.querySelector('.bottom-bar').style.display = 'flex';
    }, 50);
}