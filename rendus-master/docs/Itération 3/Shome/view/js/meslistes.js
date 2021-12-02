var favorisAffiche = false;

function afficherListes(categorie){
    var listes = document.querySelectorAll(".liste"+categorie);
    if(favorisAffiche){
        listes.forEach(element => {
            element.style.display = "none";
        });
        favorisAffiche = false;
    }
    else {
        listes.forEach(element => {
            element.style.display = "block";
        });
        favorisAffiche = true;
    }
}