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
        messages.reverse().forEach(message => {
            let side = 'left';
            if (message.username == username) {
                side = 'right';
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