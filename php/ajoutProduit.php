<?php
include("connexionbdd.php");

if(isset($_POST['ajouter_produit'])){
    try {
        $id_produit = "iuteaProd - ".random_int(1000000, 1000000000);
        $nom_produit = trim($_POST['nom_produit']);
        $description_produit = trim($_POST['description_produit']);
        $quantite_produit = trim($_POST['quantite_produit']);
        $prix_par_kilo = trim($_POST['prix_par_kilo']);
        $quantite_seuil = trim($_POST['quantite_seuil']);
        
        
        $image_produit = $_FILES['image'];
        $nomFichier = $image_produit['name'];
        $emplacementTemporaire = $image_produit['tmp_name'];
        $erreurFichier = $image_produit['error'];

        $dossierDestination = "../images/".$nom_produit."/";

        if (!is_dir($dossierDestination)) {
            mkdir($dossierDestination,0777,true);
        }

        $cheminIntermédiaire = $dossierDestination.basename($nomFichier);
        
        //Vérification de sécurité

        $extension = strtolower(pathinfo($nomFichier, PATHINFO_EXTENSION));
        $extensionAutorisees = ['jpg','jpeg', 'png', 'gif'];

        if (in_array($extension, $extensionAutorisees)) {
            if ($erreurFichier === 0) {
                # Déplacement du fichier temporaire vers la destination
                if (move_uploaded_file($emplacementTemporaire, $cheminIntermédiaire)) {
                    $cheminFinal = "images/".$nom_produit."/".basename($nomFichier);
                    $requet = $bdd->prepare("INSERT INTO produit (id_produit, nom_produit, description, quantite_produit , prix_par_kilo , quantite_seuil, image_produit) VALUES(?,?,?,?,?,?,?)");
                    $requet->execute([$id_produit,$nom_produit, $description_produit,$quantite_produit, $prix_par_kilo,$quantite_seuil, $cheminFinal ]);
                    header("location:../stock.php");
                }else {
                    "Erreur lors du déplacement du fichier.";
                }
            }else {
                echo "Une erreur est survenu lors de l'envoi.";
            }
        }else {
            echo "Format de fichier non autorisé (seulement JPG, PNG, JPEG, GIF).";
        }

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Erreur: ".$e->getMessage()."</br>";
            echo "<a href =\"../ajouterProduitStock.php\">retour</a>";
        }
}