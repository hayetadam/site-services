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
        include_once './DataBase.php';
        include_once './Post.php';
        include_once './User.php';
        $newpost = new DataBase();
        if (isset($_POST['editpost'])) {
            session_start();
            if (isset($_SESSION['nom'])) {
                $user = $_SESSION['nom'];
                if (is_file('utilisateur/' . $user . '.txt')) {
                    $ancienTitre = htmlspecialchars($_POST['ancienTitre']);
                    $author = $newpost->afficherUser($user);
                    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $newpost->modifierPost(new Post($post['titre'], $post['photo'], $post['description'], $post['prix']), $ancienTitre);
                    header("location: espaceperso.php");
                }
            }
        } else {
            echo'<p>formulaire non envoyé</p>';
        }
        ?>
    </body>
</html>
