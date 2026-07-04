<?php 
        include('php/nav.php') ;
?>
<form action="php/connexion" method="post">
    <label for="email_compte">Entrez votre e-mail</label></br>
    <input type="text" id="email_compte" name="email_compte" placeholder="Entrez votre "></br></br>
    <!-- champ pour le ou les prénoms-->
    <label for="mot_de_passe"></label></br>
    <input type="text" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez votre mot de passe"></br></br>
    <button name="connexion">Connexion</button>
</form>
<a href="inscriptionCompte">S'inscrire</a>