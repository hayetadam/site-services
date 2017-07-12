<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!--coller le lien bootstrap-->
        <title>Connexion</title>
        <style type="text/css"> 
            </style>
            </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['nom'])) {
            ?>


        <form  action="create-posts.php" method="POST">
                <label for="title">Titre</label>
                <input type="text" name="titre"/>
                <label for="description">Description</label>
                <textarea cols="30" rows="10" name="description"></textarea>
                <label for="price">Prix</label>
                <input type="number" name="prix"/> €
                <label for="photo">Photo</label>
                <input type="file"name="photo"/>
                <input type="submit" value="Envoyer" name="newpost"/>
            </form>

            <?php
        } else {
            echo 'connectez-vous !';
            ?>
            <form method="POST" action="Login.php">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp"/>
                <input type="submit" name="login"/>
            </form>
            <a href="Register-form.php">S'inscrire</a>
            <?php
        }
        ?>
    </body>
</html>
