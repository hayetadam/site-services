<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author hayet
 */
class User {

    private $pseudo;
    private $mdp;
    private $avatar;
    private $genre;
    private $age;
 

    function __construct($pseudo, $mdp, $avatar, $genre, $age) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->avatar = $avatar;
        $this->genre = $genre;
        $this->age = $age;
        
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getGenre() {
        return $this->genre;
    }

    function getAge() {
        return $this->age;
    }


    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setAge($age) {
        $this->age = $age;
    }
     public function afficherHtml() {
        return '<pre>Pseudo : ' . $this->getPseudo() . '</pre><pre><img src="' .
                $this->getAvatar() . '"></pre><pre>' .
                $this->getGenre() . '</pre><pre>' .
                $this->getAge() . '</pre><pre>';
                //$this->getDateinscription()->format('d/m/y') . '</pre>';
    }

    
/*
    public function userDonnee() {
        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdonnee = serialize($this);
        $file = fopen('utilisateur/' . $this->pseudo . '.txt', 'w');
        fwrite($file, $userdonnee);
        fclose($file);
    }
//recuprer le mdp
    public function mdpDonnee() {
        return $this->mdp;
    }
    //afficher le profil
     public function genererHtml() {
        return '<pre>Pseudo : ' . $this->pseudo . '</pre><pre><img src="' .
                $this->avatar . '"></pre><pre>' .
                $this->genre . '</pre><pre>' .
                $this->age . '</pre>';
    }
*/

}
