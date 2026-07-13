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

        <?php
            if ($_SESSION) {
                    echo '<span id="id_compte">'.$_SERVER['compte']['id_compte'].'</span>';
                    # code...
            }
        ?>
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
                    echo'<span id="produit'.$i.'">'.$produits[$i]['id_produit'].'</span>';
                    echo'<img id="img'.$i.'" src="'.$produits[$i]['image_produit'].'" alt="'.$produits[$i]['nom_produit'].'">';
                    echo'<p id="nom_produit'.$i.'">'.$produits[$i]['nom_produit'].'</p>';
                    echo'<p class="prix_par_kilo"><span id="prix'.$i.'">'.$produits[$i]['prix_par_kilo'].'</span> FCFA/kg</p>';
                    echo'<div class="stock_disponible"><span>stock disponible<span> <span id="quantite_totale_produit'.$i.'">'.$produits[$i]['quantite_produit'].'<span></div>';
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
<script src="js/index.js" type="module"></script>
</body>
</html>


