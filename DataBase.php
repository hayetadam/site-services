<?php

/**
 * Description of DataBase
 *
 * @author hayet
 */
//include_once './User.php';
class DataBase {
//1)
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=site_service', 'hayet', 'lilamahdi');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllUser() {
        //On exécute la requête de sélection
        $query = $this->db->query('SELECT * FROM site_service');
        //On crée un tableau vide qui accueillera nos users
        $users = [];
        //On boucle sur les résultats
        while ($ligne = $query->fetch()) {
            //On crée une instance d'user avec les valeurs
            //de chaque ligne de résultats
            $user = new user($ligne['pseudo'], $ligne['mdp'], $ligne = ['avatar'], $ligne['genre'], $ligne['age'], $ligne['id']);
            //On ajoute l'instance en question au tableau
            $users[] = $user;
        }
        //On renvoie le tableau
        return $users;
    }
// 2)
    public function getUserById(int $id) {
        //On prépare la requête de sélection par id avec un
        //placeholder pour la valeur de l'id
        $queryId = $this->db->prepare('SELECT * FROM site_service WHERE id=:id');
        //On assigne la valeur de l'id avec le paramètre
        //attendu par la fonction
        $queryId->bindValue('id', $id, PDO::PARAM_INT);
        //On exécute la requête
        $queryId->execute();
        //Si on a bien récupérée une seule ligne
        if ($queryId->rowCount() == 1) {
            //On fetch la ligne en question
            $ligneid = $queryId->fetch();
            //On crée une instance de chien à partir de cette ligne
            $user = new User($ligneid['pseudo'], $ligneid['mdp'], $ligneid['avatar'], $ligneid['genre'], $ligneid['age'], $ligneid['id']);
            //On retourne l'instance d'user en question
            return $user;
        }
    }
    //3)
    public function addUser(User $user): bool {
        //On prépare la requête d'ajout avec des placeholders pour les
        //values
        $queryInsert = $this->db->prepare('INSERT INTO site_service '
                . '(pseudo,mdp,avatar,genre,age) '
                . 'VALUES (:pseudo,:mdp,:avatar,:genre,:age)');
        //On assigne les paramètres en les récupérant depuis l'argument
        //chien
        $queryInsert->bindValue('pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $queryInsert->bindValue('mdp', $user->getMdp(), PDO::PARAM_STR);
        $queryInsert->bindValue('avatar', $user->getAvatar(), PDO::PARAM_STR);
        $queryInsert->bindValue('genre', $user->getGenre(), PDO::PARAM_BOOL);
        $queryInsert->bindValue('age', $user->getAge(), PDO::PARAM_BOOL);
        //On exécute en vérifiant si l'exécution fonctionne ou non
        if ($queryInsert->execute()) {
            //si oui on récupère l'id de la ligne qui vient d'être ajoutée
            //On le convertit en int et on l'assigne à notre chien
            $doge->setId(intval($this->db->lastInsertId()));
            //On renvoie true pour dire que tout s'est bien passé
            return true;
        }
        //On renvoie false si ya eu un problème quelconque
        return false;
    }
    //4)
     public function updateUser(User $user):bool {
        //On prépare la requête d'update avec des placeholders pour les
        //values
        $queryUpdate = $this->db->prepare('UPDATE site_service '
                . 'SET pseudo=:pseudo, mdp=:mdp, avatar=:avatar, genre=:genre'
                . ' age=:age WHERE id=:id');
        //On assigne les paramètres en les récupérant depuis l'argument
        //chien
        $queryUpdate->bindValue('pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $queryUpdate->bindValue('mdp', $user->getMdp(), PDO::PARAM_STR);
        $queryUpdate->bindValue('avatar', $user->getAvatar(), PDO::PARAM_STR);
        $queryUpdate->bindValue('genre', $user->getGenre(), PDO::PARAM_BOOL);
         $queryUpdate->bindValue('age', $user->getAge(), PDO::PARAM_BOOL);
        $queryUpdate->bindValue('id', $user->getId(), PDO::PARAM_INT);
        //On exécute en vérifiant si l'exécution fonctionne ou non
        if ($queryUpdate->execute()) {
            return true;
        }
        //On renvoie false si ya eu un problème quelconque
        return false;
    }
    //5)
    public function deleteUser(User $user):bool {
        //On prépare la requête de suppression avec un placeholder
        //pour l'id du user à supprimer
        $queryDel = $this->db->prepare('DELETE FROM site_service '
                . 'WHERE id=:id');
        //On assigne l'id du user passé en argument comme paramètre
        //de la requête
        $queryDel->bindValue('id', $user->getId(), PDO::PARAM_INT);
        //On execute la requête et on renvoie directement le booléen
        //du execute qui indique si la requête a marchée ou non.
        return $queryDel->execute();
    }
    

    //création d'utilisateur
    
    
    
    
    
    public function createUser(User $user): bool {
        $pseudo = $user->getPseudo();
        $mdp = $user->getMdp();
        $avatar = $user->getAvatar();
        $genre = $user->getGenre();
        $age = $user->getAge();
       

      $stmt = $this->db->prepare('INSERT INTO user(pseudo, mdp, avatar, genre, age) VALUES(:pseudo, :mdp, :avatar, :genre, :age);');
       $stmt->bindValue('pseudo', $pseudo);
      $stmt->bindValue('mdp', $mdp);
       $stmt->bindValue('avatar', $avatar); 
        $stmt->bindValue('genre', $genre);
        $stmt->bindValue('age', $age);
        
      if ($stmt->execute()) {

          $user->setId(intval($this->db->lastInsertId()));
            return TRUE;
        }
        return FALSE;
    
    }
    

    /*public function createUser(User $user) {

        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }*/

    public function connexionUser($pseudo, $mdp) {

        if (is_file("utilisateur/" . $pseudo . ".txt")) {
            $user = unserialize(file_get_contents("utilisateur/" . $pseudo . ".txt"));
            if ($user->getMdp() == $mdp) {
                return $user;
            }
        }
        return false;
    }

    public function afficherUser(User $user) {
        return '<pre>Pseudo : ' . $user . '</pre><pre><img src="' .
                $user->getAvatar() . '"></pre><pre>' .
                $user->getGenre() . '</pre><pre>' .
                $user->getAge() . '</pre>';
    }

//création d'une nouvelle annonce

    public function createPost(Post $post) {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($post);
        $file = fopen('posts/' . $post->getTitre() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }

    //unserialize user
    public function lireUser($user): User {
        return unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
    }

//unserialize annonce
    public function lirePost($titre): Post {
        $post = unserialize(file_get_contents('posts/' . $titre . '.txt'));
        return $post;
    }

    public function afficherPost($post) {
        return '</pre><pre><img src="' .
                $post->getPhoto() . '"></pre><pre>' .
                $post->getDescription() . '</pre><pre>' .
                $post->getPrix() . '</pre><pre>';
        /*
          $post->getDate()->format('d/m/y H:i') . '</pre>';
         * 
         */
    }

    //parcourir les posts

    public function afficherListPost() {
        $dossier = './posts/';
        $files = scandir($dossier);
        $listeAnnonces = [];
        foreach ($files as $content) {
            if (!is_dir($content)) {
                $listeAnnonces[] = unserialize(file_get_contents($dossier . $content));
            }
        }
        return $listeAnnonces;
    }

//mofication d'un article
    public function modifierPost(Post $post, $ancienTitre) {
        unlink('posts/' . $ancienTitre . '.txt');
        $postdata = serialize($post);
        $fichier = fopen('posts/' . $post->getTitre() . '.txt', 'w');
        fwrite($fichier, $postdata);
        fclose($fichier);
    }

    //suprimer annance
    public function suprimerPost($post) {
        unlink('posts/' . $post . '.txt');
    }

}
