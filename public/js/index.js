function validateReviewUpdater() {
    var content = document.forms["reviewUpdater"]["content"].value;
    var rating = document.forms["reviewUpdater"]["rating"].value;
    if (content == "") {
        alert("content must be filled out");
        return false;
    }
    if (rating == "") {
        alert("rating must be filled out");
        return false;
    }
}

function validateSearch(){
    var search = document.forms["searchValidator"]["searchContent"].value;
    if (search == "" /*|| search != */){
        alert("Keine Ergebnisse gefunden");
        return false;
    }
}

function validateReviewCreator(){
    var content = document.forms["reviewUpdater"]["content"].value;
    var rating = document.forms["reviewUpdater"]["rating"].value;
    if (content == "") {
        alert("content must be filled out");
        return false;
    }
    if (rating == "") {
        alert("rating must be filled out");
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
    if (password == "" || password.length > 20 || password.length < 3){
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