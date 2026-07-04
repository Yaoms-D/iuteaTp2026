<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="cadre">
        <h2>formulaire de création de compte</h2>
        <form action="php/inscription.php" method="POST">
            <!-- champ pour le nom-->
            <label for="nom_compte">nom du compte</label></br>
            <input type="text" id="nom_compte" name="nom_compte" placeholder="Entrez votre nom"></br></br>
            <!-- champ pour le ou les prénoms-->
            <label for="prenom_compte"></label></br>
            <input type="text" id="prenom_compte" name="prenom_compte" placeholder="Entrez votre ou vos prénoms"></br></br>
            <!-- champ pour l' e-mail du compte-->
            <label for="email_compte">Entrez votre e-mail</label></br>
            <input type="email" id="email_compte" name="email_compte" placeholder="Entrez votre e-mail"></br></br>
            <!-- champ pour le numéro de téléphone-->
            <label for="numero_telephone">Entrez votre numéro de téléphone</label></br>
            <input type="text" id="numero_telephone" name="numero_telephone" placeholder="Entrez votre numero de téléphone"></br></br>
            <!-- champ pour le mot de passe-->
            <label for="mdp">Mot de passe</label></br>
            <input type="password" id="mdp" name="mdp"></br></br>
            <!-- champ pour la confirmation du mot de passe-->
            <label for="mdpc">Confirmer mot de passe</label></br>
            <input type="password" id="mdpc" name="mdpc"></br></br>
            <!-- champ pour le type de compte-->
            <select name="type_compte" id="type_compte">
                <option value="administrateur">administrateur</option>
                <option value="client">client</option>
                <option value="gestionnaire_stock">gestionnaire de stock</option>
            </select>
            <button name="creercompte">Créer un compte</button>
        </form>
        <p>Vous avez un compte <a href="connexionCompte.php">connectezvous</a></p>
    </div>
</body>
</html>