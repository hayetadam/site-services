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
        if (!isset($_SESSION['nom'])) {
            
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
        } else {
            echo 'Bonjour ' . $_SESSION['nom'];
            echo '<form action="Logout.php" method="POST"><button>Se déconnecter</button></form>';
           //echo '<a href="espaceperso.php">Espace personnel</a>';
        }
        ?>
    </body>
</html>
