<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
        include('php/nav.php') ;
    ?>
    <main>
    <div class="page-title">
        <h1>Nos produits Frais</h1>
        <h3>Sélectionnez vos produits agricoles de qualité</h3>
    </div>
    <div id="liste-produit">
        <?php
        include("php/connexionbdd.php");
        $requete = $bdd->prepare("SELECT * FROM produit");
        $requete->execute();
        $produits = $requete->fetchAll();
        if ($produits) {
            for ($i=0; $i < count($produits) ; $i++) { 
                # code...
            
                echo'<div class="produit">';
                    echo'<img src="'.$produits[$i]['image_produit'].'" alt="'.$produits[$i]['nom_produit'].'">';
                    echo'<p class="nom_produit">'.$produits[$i]['nom_produit'].'</p>';
                    echo'<p class="prix_par_kilo"><span class="prix">'.$produits[$i]['prix_par_kilo'].'</span> FCFA/kg</p>';
                    echo'<div class="stock_disponible"><span>stock disponible<span> <span class="quantité_totale_produit">'.$produits[$i]['quantite_produit'].'<span></div>';
                    echo'<div class="champ">';
                        echo'<button id="retirer'.$i.'">-</button>';
                        echo'<input type="text" id="quantite_produit'.$i.'">';
                        echo'<button id="augmenter'.$i.'">+</button>';
                    echo'</div>';
                    echo'<button id="ajouter'.$i.'">ajouter</button>';

                echo'</div>';
            }
        }
        
        ?>
    </div>
    
</main>
<script src="js/index.js"></script>
</body>
</html>


