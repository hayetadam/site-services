
<?php
include_once './User.php';
include_once './DataBase.php';

/*if (!empty($_POST['pseudo'])&&!empty($_POST['mdp'])) {
    
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $user = new User($post['pseudo'], md5($post['mdp']), $post['avatar'], $post['genre'], $post['age']);
    //creer une instance pour DataBase qui permet de creer l'utilisateur
    
    $data = new DataBase();
    $data->createUser($user);
    
    
     header("location:index.php");

    session_start();
   $_SESSION['nom'] = $post['pseudo'];
   // $_SESSION['avatar'] = $post['avatar'];
    //$_SESSION['genre'] = $post['genre'];
   //$_SESSION['age'] = $post['age'];
}
*/

     if (!empty($_POST['pseudo'])&&!empty($_POST['mdp'])){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $user = new DataBase();
    $user->createUser(new User($post['pseudo'], md5($post['mdp']), $post['avatar'], $post['genre'], $post['age']));
    header("location:index.php");

  session_start();
    $_SESSION['nom'] = $post['pseudo'];
}


?>
   