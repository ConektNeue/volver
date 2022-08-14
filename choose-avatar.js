let inputfieldSearchImg = document.getElementById('inputSearchImg');
let uploadedAvatar;
let theImg = document.querySelector('.display-avatar>div');
let base64String = "";

inputfieldSearchImg.addEventListener("change", function () {
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        uploadedAvatar = reader.result;
        document.querySelector('.display-avatar>div').style.backgroundImage = `url(${uploadedAvatar})`;
        // base64String = reader.result.replace("data:", "")
            // .replace(/^.+,/, "");
        // alert(base64String);
        // uploadedAvatar = base64String;
    })
    reader.readAsDataURL(this.files[0]);
});

document.getElementById('btnValidate').addEventListener('click', function () {
    let currentUrl = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    location.href = currentUrl + '&accountAvatarUrl=' + uploadedAvatar;
});

document.getElementById('btnSkip').addEventListener('click', function () {
    let currentUrl = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    location.href = currentUrl + '&accountAvatarUrl=default';
});