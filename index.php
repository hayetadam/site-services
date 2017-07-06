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
            <a href="Post-form.php">Poster une annonce</a>

            <?php
        } else {
            echo 'Bonjour ' . $_SESSION['nom'];
            echo '<form action="Logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="espaceperso.php">Espace personnel</a><br/>';
            echo '<a href="Post-form.php">Poster une annonce</a>';
        }
        
        ?>
            
        <!--<h1>Accueil</h1>-->
        <form class="recherche">
            <select>
                <option value="0" selected="">catégories</option>
                <option value="1">  informatique</option>
                <option value="2">éducation</option>
                <option value="3">immobilier</option>
                <option value="4">finance</option>
            </select>
            <input type="text" placeholder="mot-clé"/>
            <input type="text" placeholder="Localisation"/>
            <input type="submit" value="Rechercher"/>
        </form>

        <?php
        include_once './Post.php';
        include_once './DataBase.php';
        include_once 'User.php';

        $dossier = 'posts/';
        $files = scandir($dossier);
        foreach ($files as $content) {
            if (!is_dir($content)) {
                echo '<section><h3>' . basename($content, ".txt") . '</h3>';
                echo '<div class="text">';
                $contenu = unserialize(file_get_contents($dossier . $content));
                $instance = new DataBase();
                echo $instance->afficherPost($contenu);
                echo '</div>';
            }
        }
        ?>
    </body>
</html>
