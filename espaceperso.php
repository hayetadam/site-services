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
        <title>espace-perso</title>
        <style type="text/css"> 
            body{
                background: #FFE0B2;
            }
         h1{
                text-align: center;
            }
            .info{
                background-color: #FF9800;
                width: 350px;
                height: 200px;
            }
            h2{
              text-align: center;  
            }
            </style>
    </head>
    <body>
        <h1>Mon Espace Personnel</h1>
        <div class ="info">
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
                echo '<form action="Logout.php" method="POST"><button class="btn btn-primary btn">Se déconnecter</button></form>';
                echo '<a  class="btn btn-primary btn"  href="Post-form.php">Créer une nouvelle annonce</a><br/>';
                echo '<a  class="btn btn-primary btn" href="index.php"> Accueil </a>';
            }
        } else {
            include_once 'html/connexion-html.php';
        }
        ?>
        </div>

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
