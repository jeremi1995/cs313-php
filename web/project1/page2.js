
//These 2 variables hold the verse content and note content of the
// note being edited before the editing happens.
// If the edit goes through, these will be changed.
// If it doesn't, these will be used to re-display the original note.
let verse_content = "";
let note_content = "";

function editNote(noteID, edit) {

    //If the edit button is clicked
    if (edit == 1) {
        console.log("editing");

        verse_content = document.getElementById("vc_" + noteID).innerHTML;
        note_content = document.getElementById("nc_" + noteID).innerHTML;
        
        document.getElementById("vc_" + noteID).innerHTML = "<textarea id='e_vc_" + noteID + "' rows='4' cols='40'>";
        document.getElementById("e_vc_" + noteID).value = verse_content;

        document.getElementById("nc_" + noteID).innerHTML = "<textarea id='e_nc_" + noteID + "'>";
        document.getElementById("e_nc_" + noteID).value = note_content;

        document.getElementById("edit_options_" + noteID).innerHTML =
            "<button class='btn btn-primary btn-sm' type='button' " +
            "onclick='saveNote(" + noteID + ")'>Save</button>" +
            "<button class='btn btn-light btn-sm' type='button' " +
            "onclick='editNote(" + noteID + "," + 0 + ")'>Cancel</button>";
    }

    //If the cancel button is clicked
    else {
        console.log("cancel");

        document.getElementById("vc_" + noteID).innerHTML = verse_content; //Set the html element back to the original value
        document.getElementById("nc_" + noteID).innerHTML = note_content; //Set the html element back to the original value
        document.getElementById("edit_options_" + noteID).innerHTML =
            "<button class='btn btn-primary btn-sm' type='button' " +
            "onclick='editNote(" + noteID + "," + 1 + ")'>Edit</button>";
    }

}

function saveNote(noteID) {
    console.log("saveNote executed: " + noteID);

    //make php request:
    //  - validate that the current user is authorized to execute this note
    //  - if the user is authorized, update database
    let verse_content = document.getElementById("e_vc_" + noteID).value;
    let note_content = document.getElementById("e_nc_" + noteID).value;

    let xhr = new XMLHttpRequest();

    //The purpose of this function for now is only to display
    // the response of the page to the console for debuging
    // purposes
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    }

    let POST_input = "noteID=" + noteID + "&" +
        "verse_content=" + verse_content + "&" +
        "note_content=" + note_content;
    console.log(POST_input);
    xhr.open("POST", "updateNote.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(POST_input);

    //change html display of the note
    document.getElementById("vc_" + noteID).innerHTML = verse_content;
    document.getElementById("nc_" + noteID).innerHTML = note_content;

    //Reset edit buttons
    document.getElementById("edit_options_" + noteID).innerHTML =
        "<button class='btn btn-primary btn-sm' type='button' " +
        "onclick='editNote(" + noteID + "," + 1 + ")'>Edit</button>";
}



function deleteNote(noteID) {
    console.log(noteID);

    let deleted = confirm("Are you sure you want to delete this note?");

    if (deleted) {
        let xhr = new XMLHttpRequest();

        //The purpose of this function for now is only to display
        // the response of the page to the console for debuging
        // purposes
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                location.replace("page2.php");
            }
        }

        let POST_input = "noteID=" + noteID;

        console.log(POST_input);
        xhr.open("POST", "deleteNote.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(POST_input);
    }
}