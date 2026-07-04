<?php
session_start();
include("connexionbdd.php");

if(isset($_POST['connexion'])){
    $email_compte = $_POST['email_compte'];
    $mdp = $_POST['mot_de_passe'];


    $requet = $bdd->prepare("SELECT * FROM compte WHERE email_compte=? and mot_de_passe=?");
    $requet->execute([$email_compte,$mdp]);
    $element = $requet->fetch();


    if ($element) {
        $_SESSION['compte'] = ["nom_compte" => $element['nom_compte'],"type_compte" => $element['type_compte']];
        switch ($_SESSION['compte']['type_compte']) {
            case 'client':
                header("location:../index.php");
                break;

            case 'administrateur':
                header("location:../admin.php");
                break;
            
            case 'gestionnaire_stock':
                $_SESSION['compte']['type_compte'] = "gestionnaire de stock";
                header("location:../stock.php");
                break;
            default:
                header("location:../connexionCompte");
                break;
        }
        
    }
}

if (isset($_POST['deconnexion'])) {
    session_abort();
    header("location:../index.php");
}