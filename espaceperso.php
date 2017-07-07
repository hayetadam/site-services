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
        <h2>Mon Espace Personnel</h2>
        <?php
        include_once './User.php';
        include_once './DataBase.php';
        include_once './Post.php';

        $instance = new DataBase();
        session_start();
        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];
            echo $user;
            if (is_file('utilisateur/' . $user . '.txt')) {
                 // $contenu = $instance->afficherUser($user);
                // echo $contenu->afficherHtml();
                echo '<form action="Logout.php" method="POST"><button>Se déconnecter</button></form>';
                echo '<a href="Post-form.php">Créer une nouvelle annonce</a><br/>';
                echo '<a href="index.php"> Accueil </a>';
            }
        } else {
            include_once 'html/connexion-html.php';
        }
        ?>

        <h2>Mes annonces</h2>

        <?php
        include_once './Post.php';
        include_once './DataBase.php';
        include_once './User.php';
        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];
            $listeAnnonces = $instance->afficherListPost();
            foreach ($listeAnnonces as $annonce) {
                $author = $annonce->getAuthor();
                if ($author === $user) {
                    echo $annonce->afficherHtml();

                    echo'
            <div class="boutons">
            <form method="POST" action="delet.php">
            <input type="hidden" name="filename" value="' . $annonce->getTitre() . '" class="text">
            <input type="submit" value="supprimer">
            </form>
    
            <form method="POST" action="edit-form.php">
            <input type="hidden" name="filename" value="' . $annonce->getTitre() . '">
                <input type="submit" value="modifier">
            </form>
            </div>';
                }
            }
        }
        ?>



    </body>
</html>
