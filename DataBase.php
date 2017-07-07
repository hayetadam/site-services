<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBase
 *
 * @author hayet
 */
//include_once './User.php';
class DataBase {

    //création d'utilisateur

    public function createUser(User $user) {

        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }

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
