function openConnexionWindow() {
    height = document.getElementById("connexionWindow").style.height;
    if(height == "0em"){
        document.getElementById("connexionWindow").style.height = "25em";
        document.getElementById("connexionWindow").style.borderWidth = "0px 0px 2px 0px";
        location.hash = "#menu";
        document.getElementById("email").focus();
        document.getElementById("boutonConnexion").style.fontWeight = "bold";
        //document.getElementById("boutonConnexion").style.backgroundColor = "#47adb1";
    }
    else {
        document.getElementById("connexionWindow").style.height = "0em";
        document.getElementById("connexionWindow").style.borderWidth = "0px";
        document.getElementById("boutonConnexion").style.fontWeight = "normal";
        //document.getElementById("boutonConnexion").style.backgroundColor = "white";
    }
}

function InscriptionToConnexion(){
    window.location.replace("../view/mainpage.view.php");
}


function confirmerMDP(){
    if (document.getElementById('password').value!=document.getElementById('confirmPassword').value){
        document.getElementById('confirmPassword').setCustomValidity('Les 2 mots de passe sont différents');
    }else{
        document.getElementById('confirmPassword').setCustomValidity('');
    }
}

function hamburgerClick() {
    hamburger = document.getElementById("hamburger");
    if(hamburger.classList.contains("is-active")){
        hamburger.classList.remove("is-active");
    }
    else {
        hamburger.classList.add("is-active");
    }
}