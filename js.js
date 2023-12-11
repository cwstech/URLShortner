function copyText() {
    var copyText = document.getElementById("copyBox").querySelector("code");
    var range = document.createRange();
    range.selectNode(copyText);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
    
    // alert("Code copied to clipboard!");
}
