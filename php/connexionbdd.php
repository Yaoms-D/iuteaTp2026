<?php
    $bd = "tpiutea";
    $user = "root";
    $pwd = "";
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=$bd;charset=utf8",$user, $pwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur: ".$e->getMessage());
    }

?>