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
        include_once './User.php';
        include_once './DataBase.php';

        if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $pseudo = $post['pseudo'];
            $mdp = md5($post['mdp']);
            if (is_file('utilisateur/' . $pseudo . '.txt')) {
                $contenu = unserialize(file_get_contents('utilisateur/' . $pseudo . '.txt'));
                $mdp_data = $contenu->getMdp();

                if ($mdp_data == $mdp) {
                    session_start();
                    $_SESSION['nom'] = $pseudo;
                    echo 'connecté';
                    header("location:index.php");
                } else {
                    echo 'pas connecté';
                }
            } else {
                echo 'l\'utilisateur ' . $pseudo . ' n\'existe pas';
            }
        } else {
            echo 'pas de données';
        }
         

        ?>

    </body>
</html>
