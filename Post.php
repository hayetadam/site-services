<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author hayet
 */
class Post {

    protected $titre;
    protected $categorie;
    protected $photo;
    protected $date;
    protected $description;
    protected $localisation;
    protected $prix;
    protected $author;

    

   function __construct($titre, $photo, $description, $prix, User $author, $categorie, $localisation) {
        $this->title = $title;
        $this->photo = $photo;
        $this->date = new DateTime();
        $this->description = $description;
        $this->prix = $prix;
        $this->author = $author->getPseudo();
        $this->categorie = $categorie;
        $this->localisation = $localisation;
    }
    function getTitre() {
        return $this->titre;
    }
    function getCategorie() {
        return $this->categorie;
    }
    function getPhoto() {
        return $this->photo;
    }
    function getDate() {
        return $this->date;
    }
    function getDescription() {
        return $this->description;
    }
    function getLocalisation() {
        return $this->localisation;
    }
    function getPrix() {
        return $this->prix;
    }
    function getAuthor() {
        return $this->author;
    }
    function setTitre($titre) {
        $this->titre = $titre;
    }
    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }
    function setPhoto($photo) {
        $this->photo = $photo;
    }
    function setDate($date) {
        $this->date = $date;
    }
    function setDescription($description) {
        $this->description = $description;
    }
    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }
    function setPrix($prix) {
        $this->prix = $prix;
    }
    function setAuthor($author) {
        $this->author = $author;
    }
    public function afficherHtml() {
        return '<br/><pre><h3>' . $this->getTitre() . '</h3></pre><pre><img src="' .
                $this->getPhoto() . '"></pre><pre>' .
                $this->getDescription() . '</pre><pre>' .
                $this->getPrix() . ' €</pre><pre>' .
                $this->getDate()->format('d/m/y H:i') . '</pre><pre>Auteur : ' .
                $this->getAuthor() . '</pre><pre>Catégorie : ' .
                $this->getCategorie() . '</pre><pre>Localisation : ' .
                $this->localisation . '</pre>';
    }


}
