let root = document.querySelector(':root');

let txtBox = document.querySelector('.txt-box');
let textarea = document.getElementById('textarea');

textarea.addEventListener("input", function (e) {
    txtBox.style.height = (this.scrollHeight) + "px";
    // root.style.setProperty('--txt-box-height', 'this.scrollHeight - 48');
    // if (this.scrollHeight < 48) {
        // this.style.height = '34px';
        // console.log('inner');
    // }
    if (this.scrollHeight < 48) {
        txtBox.style.height = 'max-content';
    }
    console.log(this.scrollHeight);
});