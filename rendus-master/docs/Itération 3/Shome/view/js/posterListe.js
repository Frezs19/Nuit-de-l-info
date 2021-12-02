function afficherSubstituant(number){
    document.getElementById("buttons"+number).style.display = "none";
    var substituant = document.querySelectorAll("#produit" + number + " > .substituants");
    substituant.forEach(element => {
        element.style.display = "flex";
    });

    var input = document.querySelectorAll("#produit" + number + " > .substituants > input");
    input.forEach(element => {  
        if (element.name=='produit['+number+'][substituant][prixMax]'){
            element.required = true;
        }
        else if (element.name=='produit['+number+'][substituant][nom]'){
            element.required = true;
        }
    });
    document.getElementById("subdel"+number).style.display = "flex";
}

function supprimerSubstituant(number){
    var substituant = document.querySelectorAll("#produit" + number + " > .substituants");
    substituant.forEach(element => {
        element.style.display = "none";
    });
    var input = document.querySelectorAll("#produit" + number + " > .substituants > input");
    input.forEach(element => {
        element.value = "";
        element.required = false;
    });
    document.getElementById("subdel"+number).style.display = "none";
    document.getElementById("buttons"+number).style.display = "flex";
}

function supprimerProduit(number){
    var r = confirm("Voulez vous vraiment supprimez ce produit ?");
    if (r == true) {
        var produit = document.getElementById("produit"+number);
        produit.parentNode.removeChild(produit);
    } else {
    }
}

var nombreProduit = 1;

function ajouterProduit(){
    nombreProduit++;
    var number = nombreProduit;
    listeProduit = document.getElementById("listeProduit");

    var div = document.createElement("DIV");  
    div.setAttribute("class","produit");
    div.setAttribute("id","produit"+nombreProduit);
    div.innerHTML = '<div class="center"><input type="text" name="produit['+number+'][principal][nom]" placeholder="Nom du produit *" autofocus required class="input"><input type="text" name="produit['+number+'][principal][marque]" placeholder="Marque du produit" class="input"></div><div class="center"><input type="number" name="produit['+number+'][principal][prixMax]" placeholder="Prix maximum en € *" class="input" required><input type="text" name="produit['+number+'][principal][quantite]" placeholder="Quantité désiré" class="input"></div><div class="center substituants "><input type="text" name="produit['+number+'][substituant][nom]" placeholder="Nom du substituant *" autofocus class="input substituant"><input type="text" name="produit['+number+'][substituant][marque]" placeholder="Marque du substituant" class="input substituant"></div><div class="center substituants "><input type="number" name="produit['+number+'][substituant][prixMax]" placeholder="Prix maximum en € *" class="input substituant"><input type="text" name="produit['+number+'][substituant][quantite]" placeholder="Quantité désiré" class="input substituant"></div><div class="center"><div class="substituer" onclick="afficherSubstituant('+number+');" id="buttons'+number+'"><img src="../view/img/shuffle.png" class="logo-sm"><p>Substituer ?</p></div><div class="supprimerSubstituant" id="subdel'+number+'" onclick="supprimerSubstituant('+number+');"><img src="../view/img/wrong.png" class="logo-sm"></div><div class="supprimerProduit" id="subproduit'+number+'" onclick="supprimerProduit('+number+');"><img src="../view/img/bin.png" class="logo-sm"></div></div>'; 
    listeProduit.appendChild(div);
}

function ajouterProduitRemplit(nom,marque,prix,quantite,nomS,marqueS,prixS,quantiteS){
    nombreProduit++;
    var number = nombreProduit;
    listeProduit = document.getElementById("listeProduit");

    var div = document.createElement("DIV");  
    div.setAttribute("class","produit");
    div.setAttribute("id","produit"+nombreProduit);
    div.innerHTML = '<div class="center"><input type="text" name="produit['+number+'][principal][nom]" placeholder="Nom du produit *" value="'+nom+'" autofocus required class="input"><input type="text" name="produit['+number+'][principal][marque]" placeholder="Marque du produit" value="'+marque+'" class="input"></div><div class="center"><input type="number" name="produit['+number+'][principal][prixMax]" placeholder="Prix maximum en € *" value="'+prix+'" class="input" required><input type="text" name="produit['+number+'][principal][quantite]" placeholder="Quantité désiré" value="'+quantite+'" class="input"></div><div class="center substituants "><input type="text" name="produit['+number+'][substituant][nom]" placeholder="Nom du substituant *" value="'+nomS+'" autofocus class="input substituant"><input type="text" name="produit['+number+'][substituant][marque]" placeholder="Marque du substituant" value="'+marqueS+'" class="input substituant"></div><div class="center substituants "><input type="number" name="produit['+number+'][substituant][prixMax]" placeholder="Prix maximum en € *" value="'+prixS+'" class="input substituant"><input type="text" name="produit['+number+'][substituant][quantite]" placeholder="Quantité désiré" value="'+quantiteS+'" class="input substituant"></div><div class="center"><div class="substituer" onclick="afficherSubstituant('+number+');" id="buttons'+number+'"><img src="../view/img/shuffle.png" class="logo-sm"><p>Substituer ?</p></div><div class="supprimerSubstituant" id="subdel'+number+'" onclick="supprimerSubstituant('+number+');"><img src="../view/img/wrong.png" class="logo-sm"></div><div class="supprimerProduit" id="subproduit'+number+'" onclick="supprimerProduit('+number+');"><img src="../view/img/bin.png" class="logo-sm"></div></div>'; 
    listeProduit.appendChild(div);
    if (nomS!=""){
        afficherSubstituant(number);
    }
}

function ajusteTaille(element){
    var width = element.offsetWidth;
    var valuewidth = element.value.length*9+82;
    if(valuewidth >= width){
        element.style.width = valuewidth * 1.10+"px";
    }
    else if(valuewidth*0.75 <= width){
        element.style.width = valuewidth * 1.10+"px";
        element.style.style.minWidth = "12em";
    }
}