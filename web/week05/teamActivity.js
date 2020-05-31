document.getElementById("addTopic").addEventListener("click", enableNewTopic);
document.getElementById("mySubmitButton").addEventListener("click", ajaxToDB);

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

function ajaxToDB() {
    let scripture_book = document.getElementById("in_book").value;
    let scripture_chapter = document.getElementById("in_chapter").value;
    let scripture_verse = document.getElementById("in_verse").value;
    let scripture_content = document.getElementById("in_content").value;

    //Handling the array of topics
    let scripture_topics_ids = [];
    let topicObjs = document.getElementsByClassName("in_topics");
    for (topic of topicObjs) {
        scripture_topics_ids.push(topic.value);
    }
    let stid = JSON.stringify(scripture_topics_ids); //send this to the server

    //Handling the new topic if any
    let new_topic_name = "";
    if (document.getElementById("addTopic").checked == true) {
        new_topic_name = document.getElementById("newTopic").value;
    }
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            display1(this.response);
        }
    }

    let inputQuery = "book=" + scripture_book + "&" +
                     "chapter=" + scripture_chapter + "&" +
                     "verse="+ scripture_verse + "&" +
                     "content=" + scripture_content + "&" +
                     "topics_json=" + stid;
    
    if (new_topic_name != "") {
        inputQuery += "&" + "new_topic=" + new_topic_name;
    }

    xhr.open("POST", "handleNewScripturePerAJAX.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(inputQuery);
}

function display1(response) {
    console.log(response);
}