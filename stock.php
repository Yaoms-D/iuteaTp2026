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
        <a href="ajouterProduitStock.php">Ajouter un produit</a>
        <table>
            <thead>
                <tr>
                    <td>Produits</td>
                    <td>Prix (FCFA/kg)</td>
                    <td>Stock (kg)</td>
                    <td>Disponibilité prévue</td>
                    <td>Statut</td>
                    <td>Valeur</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("php/connexionbdd.php");
                    $requete = $bdd->prepare("SELECT * FROM produit");
                    $requete->execute();
                    $produits = $requete->fetchall();
                    for ($i=0; $i <count($produits) ; $i++) { 
                        $valeur_stock_produit = $produits[$i]['quantite_produit'] * $produits[$i]['prix_par_kilo'];
                        echo'<tr>';
                            echo'<td><img class="icon_produit" src="'.$produits[$i]['image_produit'].'" alt="'.$produits[$i]['nom_produit'].'"/><span>'.$produits[$i]['nom_produit'].'</span>'.'</span></td>';
                            echo'<td><span>'.$produits[$i]['prix_par_kilo'].'</span></td>';
                            echo'<td><span>'.$produits[$i]['quantite_produit'].'</span></td>';
                            echo'<td><span>'.$produits[$i]['disponibilite_prevue_produit'].'</span></td>';
                            echo'<td><span>'.$produits[$i]['statut_stock_produit'].'</span></td>';
                            echo'<td><span>'.$valeur_stock_produit.'</span></td>';
                            echo'<td><span id="enregistrer_stock'.$i.'"></span><span id="annuler_modification_stock'.$i.'"></span></td>';
                        echo'</tr>';
                    }
                    
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>