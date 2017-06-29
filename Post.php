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
    
    function __construct($titre, $categorie, $photo, $date, $description, $localisation, $prix, $author) {
        $this->titre = $titre;
        $this->categorie = $categorie;
        $this->photo = $photo;
        $this->date = $date;
        $this->description = $description;
        $this->localisation = $localisation;
        $this->prix = $prix;
        $this->author = $author;
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



    
}