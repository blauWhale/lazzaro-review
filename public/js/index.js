function validateReviewUpdater() {
    var content = document.forms["reviewUpdater"]["content"].value;
    var rating = document.forms["reviewUpdater"]["rating"].value;
    if (content == "") {
        alert("Bitte alle Felder ausfüllen.");
        return false;
    }
    if (rating == "") {
        alert("Bitte alle Felder ausfüllen.");
        return false;
    }
}

function validateSearch(){
    var search = document.forms["searchbar"]["searchContent"].value;
    if (search == ""){
        alert("Bitte etwas eingeben.");
        return false;
    }
}


function validateFooterSearch(){
    var search = document.forms["footerSearch"]["searchContent"].value;
    if (search == ""){
        alert("Bitte etwas eingeben.");
        return false;
    }
}

function validateReviewCreator(){ //TODO Validation JS
    var content = document.forms["reviewCreator"]["content"].value;
    var rating = document.forms["reviewCreator"]["rating"].value;
    var trackOption = document.forms["reviewCreator"]["trackOption"].value;
    if (rating == "" || rating.isInteger() || rating<0 && rating>11) {
        alert("Überprüfe das Ratingfeld");
        return false;
    }
    if (content == "") {
        alert("Bitte alle Felder ausfüllen.");
        return false;
    }
    if (trackOption == "" || trackOption<0 && trackOption>100 ) {
        alert("Bitte ein Lied auswählen.");
        return false;
    }

}

function validateUserCreator(){
    var username = document.forms["userCreator"]["username"].value;
    var email = document.forms["userCreator"]["email"].value;
    var password = document.forms["userCreator"]["password"].value;
    var pattern = '/^[a-zA-Z0-9]{3,25}+$';
    if (username == "" || !username.match(pattern)){
        alert("Ungültiger Benutername")
        return false;
    }
    if (email == "" || !email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        alert("Email ungültig")
        return false;
    }
    if (password.length > 20 || password.length < 3){
        alert("Passwort muss zwischen 3 und 20 Zeichen lang sein.")
        return false;
    }
}

function validateUserLogin(){
    var email = document.forms["userLogin"]["email"].value;
    var password = document.forms["userLogin"]["password"].value;
    if (email == "" || !email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        alert("Email ungültig")
        return false;
    }
    if (password == "" || password.length > 20 || password.length < 3){
        alert("Passwort muss zwischen 3 und 20 Zeichen lang sein.")
        return false;
    }
}

function validateContact(){
    var vorname = document.forms["contactValidator"]["vorname"].value;
    var nachname = document.forms["contactValidator"]["nachname"].value;
    var email = document.forms["contactValidator"]["email"].value;
    var message = document.forms["contactValidator"]["msg"].value;
    if (vorname == "" || nachname == ""){
        alert("Bitte Ihren Namen eingeben.")
        return false;
    }
    if (email == "" || !email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        alert("Email ungültig")
        return false;
    }
    if (message == ""){
        alert("Bitte Ihre Nachricht eingeben.")
        return false;
    }
}

function validateTrackCreator(){
    var trackname = document.forms["trackCreator"]["trackname"].value;
    var producer = document.forms["trackCreator"]["producer_name"].value;
    var artist = document.forms["trackCreator"]["artist_name"].value;
    var genre = document.forms["trackCreator"]["genre"].value;
    var release = document.forms["trackCreator"]["release_year"].value;
    if (trackname == ""){
        alert("Tracknamen eingeben.")
        return false;
    }
    if (producer == ""){
        alert("Produzentennamen eingeben.")
        return false;
    }
    if (artist == ""){
        alert("Sängernamen eingeben.")
        return false;
    }
    if (genre == ""){
        alert("Genre eingeben.")
        return false;
    }
    if (release == ""){
        alert("Erscheinungsdatum eingeben.")
        return false;
    }
}

function validateComments(){
    var comment = document.forms["commentValidator"]["comment_content"].value;
    if (comment.length > 100 || comment.length < 10){
        alert("Ein Kommentar muss zwischen 10 und 100 Zeichen lang sein.")
        return false;
    }
}