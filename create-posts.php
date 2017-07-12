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
        include_once './Post.php';
        include_once './DataBase.php';
        include_once './User.php';
        
        /*
        if (isset($_POST['newpost'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $newpost = new DataBase();
            $newpost->createPost(new Post($post['titre'], $post['photo'], $post['description'], $post['prix']));
            $newpostdata = unserialize(file_get_contents('posts/' . $post['titre'] . '.txt'));
            $instance = new DataBase();
            echo $instance->afficherPost($newpostdata);
        } else {
            echo 'pas d\'article';
        }
        
        */
        if (isset($_POST['newpost'])) {
            
    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];
        $instance = new DataBase();
        if (is_file('utilisateur/' . $user . '.txt')) {
           $contenu = $instance->lireUser($user);
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $instance->createPost(new Post($post['titre'], $post['photo'], $post['description'], $post['prix'], $contenu, $post['categorie'], $post['localisation']));
            header("location:index.php");
        }
    }
} else {
    echo 'pas d\'article';
}

        
        ?>
    </body>
</html>
