<?php
session_start();
include ("connexionbdd.php");

if(isset($_POST['creercompte'])){
    
    $nom_compte = $_POST['nom_compte'];
    $prenom_compte = $_POST['prenom_compte'];
    $email_compte = $_POST['email_compte'];
    $type_compte = $_POST['type_compte'];
    $id_compte = "IUTEA-".$type_compte.random_int(1000000, 1000000000);
    $numero_telephone = $_POST['numero_telephone'];
    $mdp =$_POST['mdp'] ;
    $mdpc =$_POST['mdpc'];

    if ($mdp == $mdpc) {
        $requete = $bdd->prepare("INSERT INTO compte(id_compte,nom_compte,prenom_compte,email_compte,numero_telephone ,mot_de_passe,type_compte)VALUES(?,?,?,?,?,?,?)");
        $requete->execute([$id_compte,$nom_compte, $prenom_compte,$email_compte,$numero_telephone,$mdp,$type_compte]);
        $requete2 = $bdd->prepare("SELECT * FROM compte WHERE email_compte=? and mot_de_passe=?");
        $requete2->execute([$email_compte,$mdp]);
        $element = $requete2->fetch();
        if ($element) {
        $_SESSION['compte'] = ["id_compte" => $id_compte,"nom_compte" => $element['nom_compte'],"type_compte"=>$element['type_compte']];
        var_dump($_SESSION['compte']['type_compte']);
        switch ($_SESSION['compte']['type_compte']) {
            case 'client':
                header("location:../index.php");
                break;

            case 'administrateur':
                header("location:../admin.php");
                break;
            
            case 'gestionnaire_stock':
                $_SESSION['compte']['type_compte'] = "Gestionnaire de stock";
                header("location:../stock.php");
                break;
            default:
                header("location:../connexionCompte");
                break;
        }
        
    }
    }else{
        header("location:../inscriptionCompte.php");
    }
}

?>