let currentUsername = document.querySelector('.current-username').getAttribute('id');
let root = document.querySelector(':root');

const theActiveElement = document.activeElement

let txtBox = document.querySelector('.txt-box');
let textarea = document.getElementById('textarea');
let textareaHeight = textarea.offsetHeight;
let textareaLineHeight = 24;
console.log(textareaHeight);

textarea.addEventListener("input", function (e) {
    // txtBox.style.height = (this.scrollHeight) + "px";
    // root.style.setProperty('--txt-box-height', 'this.scrollHeight - 48');
    // if (this.scrollHeight < 48) {
    // this.style.height = '34px';
    // console.log('inner');
    // }
    let textareaLineNumber = Math.floor(this.scrollHeight / textareaLineHeight);
    console.log(textareaLineNumber);

    // if (this.scrollHeight > this.offsetHeight && this.scrollHeight <= 100) {
    // this.style.height = this.offsetHeight + textareaHeight + 'px';
    // txtBox.style.height = txtBox.offsetHeight + this.offsetHeight + 'px';
    // console.log('over: ' + textareaLineNumber);
    // }

    if (textareaLineNumber < 5) {
        textarea.style.height = '27px';
        setTimeout(() => {
            textareaLineNumber = Math.floor(this.scrollHeight / textareaLineHeight);
            textarea.style.height = textareaLineHeight * textareaLineNumber + 2 + 'px';
            txtBox.style.height = textarea.offsetHeight + textareaLineHeight * textareaLineNumber + 'px';
        }, 5);
        // this.style.height = (27 * textareaLineNumber) + 'px';
        console.log('under:' + textareaLineNumber);
    }
    // if ()
    console.log(this.scrollHeight);
});

window.addEventListener("keydown", function (e) {
    if (e.keyCode === 8) {
        console.log('8');
        if (document.activeElement === textarea) {
            textareainput();
        }
    }
});

function textareainput() {
    textarea.style.transition = '0s';
    let textareaLineNumber = Math.floor(textarea.scrollHeight / textareaLineHeight);
    if (textareaLineNumber < 5) {
        textarea.style.height = '27px';
        setTimeout(() => {
            textareaLineNumber = Math.floor(textarea.scrollHeight / textareaLineHeight);
            textarea.style.height = textareaLineHeight * textareaLineNumber + 2 + 'px';
        }, 5);
        // this.style.height = (27 * textareaLineNumber) + 'px';
        // txtBox.style.height = txtBox.offsetHeight + textareaHeight + 'px';
        console.log('under:' + textareaLineNumber);
    }
    setTimeout(() => {
        textarea.style.transition = '3s';
    }, 50);
}

let memberListToggleIndicator = false;

function memberlistToggle() {
    if (memberListToggleIndicator === false) {
        document.getElementById('memberList').style.display = 'flex';
        document.querySelector('.btn-member-list').style.backgroundColor = 'black';
        document.querySelector('.btn-member-list').style.color = 'white';
        memberListToggleIndicator = true;
    } else {
        document.getElementById('memberList').style.display = 'none';
        document.querySelector('.btn-member-list').style.backgroundColor = 'transparent';
        document.querySelector('.btn-member-list').style.color = 'black';
        memberListToggleIndicator = false;
    }
}

function deletemsg() {
    let currentUrl = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    location.href = currentUrl + '&function=deletemsg';
}

function deleteacc() {
    let currentUrl = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    location.href = currentUrl + '&function=deleteacc';
}

let msgGlobalContainers = document.getElementsByClassName("msg-global-container");

let msgGlobalContainersLongpress = function () {
        // let attribute = this.getAttribute("data-long-press-delay");
        // alert(attribute);
        this.style.backgroundColor = 'rgba(255, 200, 200)';
        this.classList.add('msg-long-press-active');
        document.querySelectorAll('.msg-global-container').forEach(function (element) {
            element.setAttribute("data-long-press-delay", "0");
        });
    if (this.getAttribute('data-msg-name') === currentUsername) {
        navbarActionOpen('msg-properties');
    } else {
        navbarActionOpen('no-msg-properties');
    }
};

for (var i = 0; i < msgGlobalContainers.length; i++) {
    msgGlobalContainers[i].addEventListener('long-press', msgGlobalContainersLongpress, false);
}

// el.addEventListener('long-press', function (e) { });

document.querySelectorAll('.btnnav-msg').forEach(function (element) {
    element.style.display = 'none';
    element.style.color = 'orangered';
    element.style.borderColor = 'orangered';
});

function navbarActionOpen(msgProperties) {
    document.querySelectorAll('.btnnav-user').forEach(function (element) {
        element.style.display = 'none';
    });
    document.querySelectorAll('.btnnav-msg').forEach(function (element) {
        element.style.display = 'flex';
        if (msgProperties === 'no-msg-properties') {
            if (element.classList.contains('btnnav-erase-msg')) {
                element.style.display = 'none';
            }
        }
    });
}

function cancelMsgBtnnav() {
    document.querySelectorAll('.btnnav-msg').forEach(function (element) {
        element.style.display = 'none';
    });
    document.querySelectorAll('.btnnav-user').forEach(function (element) {
        element.style.display = 'flex';
    });
    document.querySelectorAll('.msg-global-container').forEach(function (element) {
        element.setAttribute("data-long-press-delay", "750");
        element.style.backgroundColor = 'white';
        element.classList.remove('msg-long-press-active');
    });
}

function eraseMsgBtnnav() {
    let msgIds = [];
    document.querySelectorAll('.msg-long-press-active').forEach(function (element) {
        console.log(msgIds);
        msgIds.push(element.getAttribute('data-msg-id'));
    });
    let msgIdsString = msgIds.join(',');
    let currentUrl = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    location.href = currentUrl + '&erasemsg=' + msgIdsString;
}