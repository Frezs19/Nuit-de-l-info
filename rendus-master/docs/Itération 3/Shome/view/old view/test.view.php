<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../design/style.css">
    <title>Page principale</title>
</head>
<body>
    <form action="../controler/posterListe.ctrl.php" method="post" class="form-example">
        <div class="form-example">
            <label >nom : </label>
            <input name="produit[1][nom]" required>
        </div>
        <div class="form-example">
            <label >prixMax : </label>
            <input name="produit[1][prixMax]" required>
        </div>
        <div class="form-example">
            <label >marque : </label>
            <input name="produit[1][marque]" required>
        </div>
        <div class="form-example">
            <label >quantite : </label>
            <input name="produit[1][quantite]" required>
        </div>
        <div class="form-example">
            <label >nomSubstitut : </label>
            <input name="produit[1][nomSubstitut]" required>
        </div>
        <div class="form-example">
            <label >prixMaxSubstitut : </label>
            <input name="produit[1][prixMaxSubstitut]" required>
        </div>
        <div class="form-example">
            <label >marqueSubstitut : </label>
            <input name="produit[1][marqueSubstitut]" required>
        </div>
        <div class="form-example">
            <label >quantiteSubstitut : </label>
            <input name="produit[1][quantiteSubstitut]" required>
        </div>
        <div class="form-example">
            <input type="submit" value="Subscribe!">
        </div>
</body>
</html>