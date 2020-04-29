document.getElementById("button1").addEventListener("click", button1Func)
document.getElementById("div1Button").addEventListener("click", div1ButtonFunc)

var colors = ["red", "blue", "green", "black", ]
var currentIndex = 0;

function button1Func() {
    alert("clicked");
}

function div1ButtonFunc() {

    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);

    console.log("rgb(" + r + "," + g + "," + b + ")");
    document.getElementById("div1").style.color = "rgb(" + r + "," + g + "," + b + ")";

    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);

    document.getElementById("div1").style.backgroundColor = "rgb(" + r + "," + g + "," + b + ")";
}