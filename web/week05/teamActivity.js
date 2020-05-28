document.getElementById("addTopic").addEventListener("click", enableNewTopic);

function enableNewTopic() {
    let el = document.getElementById("addTopic");
    if (el.checked == true) {
        document.getElementById("newTopic").disabled = false;
        document.getElementById("newTopic").required = true;
    }
    else {
        document.getElementById("newTopic").disabled = true;
        document.getElementById("newTopic").required = false;
    }
}