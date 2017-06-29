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
class DataBase {

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
      return '<pre>Pseudo : ' . $user->getPseudo() . '</pre><pre><img src="' .
      $user->getAvatar() . '"></pre><pre>' .
      $user->getGenre() . '</pre><pre>' .
      $user->getAge() . '</pre>';
      }

      public function createPost(Post $post) {
      if (!is_dir('posts')) {
      mkdir('posts');
      }
      $postdata = serialize($post);
      $file = fopen('posts/' . $post->getTitre() . '.txt', 'w');
      fwrite($file, $postdata);
      fclose($file);
      }

      public function afficherPost(Post $post) {
      return '</pre><pre><img src="' .
      $post->getPhoto() . '"></pre><pre>' .
      $post->getDescription() . '</pre><pre>' .
      $post->getPrix() . '</pre><pre>';
      /*
      $post->getDate()->format('d/m/y H:i') . '</pre>';
       * 
       */
      }

     
}
