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
        
        $instance = new DataBase();
        $content = htmlspecialchars($_POST['filename']);
        if (isset($_POST['filename'])) {
            $instance->suprimerPost($content);
            header("location: espaceperso.php");
        }
        ?>
    </body>
</html>
