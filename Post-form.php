<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['nom'])) {
            ?>


            <form action="create-posts.php" method="POST">
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
