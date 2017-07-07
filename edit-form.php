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
        include_once './User.php';
        include_once './Post.php';
        
        $instance = new DataBase();
        if (isset($_POST['filename'])) {
            $file = htmlspecialchars($_POST['filename']);
            $post = $instance->lirePost($file);
            $title = $post->getTitre();
            $description = $post->getDescription();
            $price = $post->getPrix();
            $photo = $post->getPhoto();
            echo'
              
            <form action="edit.php" method="POST">
                    <label for="title">Titre</label>
                    <input type="text" name="title" value="' . $title . '"/>
                    <input type="hidden" name="ancienTitre" value="' . $title . '"/>
                    <label for="description">Description</label>
                    <textarea cols="30" rows="10" name="description" >' . $description . '</textarea>
                    <label for="price">Prix</label>
                    <input type="number" name="price" value="' . $price . '"/> €
                    <label for="photo">Photo</label>
                    <input type="file"name="photo"/>
                    <input type="submit" value="Envoyer" name="editpost"/>
                </form>';
        }
        ?>
    </body>
</html>
