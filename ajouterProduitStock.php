<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter produits</title>
</head>
<body>
    <?php 
        include('php/nav.php') ;
    ?>
    <a href="stock.php">retour au stock</a>
    <div class="form">
        <form action="php/ajoutproduit.php" method="post" enctype="multipart/form-data">
            <!--image produit-->
            <input type="file" name="image" id="image" accept="image/*" require></br>

            <!--Nom du produit-->
            <textarea name="nom_produit" id="nom_produit" placeholder="Entrez le nom du produit" require></textarea> </br>
            <!--description du produit-->
            <textarea name="description_produit" id="description_produit" placeholder="Entrez la description du produit"></textarea></br>

            <!--Quantité du produit-->
            <input type="text" name="quantite_produit" placeholder="Entrez la quantité en kilogramme du produit" require></br>
            <!--description du produit-->
            <input type="text" name="prix_par_kilo" id="prix_par_kilo" placeholder="Entrez le prix par kilo du produit" require></br>

            <!--Quantité seuil du produit-->
            <input type="text" name="quantite_seuil" placeholder="Entrez la quantité seuil du produit en kilogramme" require></br>

            <button name="ajouter_produit">ajouter</button>


        </form>
    </div>

</body>
</html>