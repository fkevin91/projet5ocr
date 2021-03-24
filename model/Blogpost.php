<?php
class Blogpost {
  // Properties
  public $titre;
  public $chapo;
  public $contenu;
  public $auteur;
  public $date;
  public $photo_url;

  // Methods

  function __construct($titre, $chapo, $contenu, $auteur, $date, $photo_url) {
    $this->titre = $titre;
    $this->chapo = $chapo;
    $this->contenu = $contenu;
    $this->auteur = $auteur;
    $this->date = $date;
    $this->photo_url = $photo_url;
  }

  function get_titre() {
    return $this->titre;
  }

  function get_chapo() {
    return $this->chapo;
  }

  function get_contenu() {
    return $this->contenu;
  }

  function get_auteur() {
    return $this->auteur;
  }

  function get_date() {
    return $this->date;
  }

  function get_photo_url() {
    return $this->photo_url;
  }
  
}
