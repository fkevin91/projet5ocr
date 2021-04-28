<?php
class Blogpost {
  // Properties
  private $titre;
  private $chapo;
  private $contenu;
  private $auteur;
  private $date;
  private $photo_url;

  // Methods
  
  /**
   * __construct
   *
   * @param  string $titre
   * @param  string $chapo
   * @param  string $contenu
   * @param  string $auteur
   * @param  string $date
   * @param  string $photo_url
   * @return void
   */
  public function __construct($titre, $chapo, $contenu, $auteur, $date, $photo_url) {
    $this->titre = $titre;
    $this->chapo = $chapo;
    $this->contenu = $contenu;
    $this->auteur = $auteur;
    $this->date = $date;
    $this->photo_url = $photo_url;
  }
  
  /**
   * get_titre
   *
   * @return titre du blogpost
   */
  public function get_titre() {
    return $this->titre;
  }
  
  /**
   * get_chapo
   *
   * @return chapo du blogpost
   */
  public function get_chapo() {
    return $this->chapo;
  }
  
  /**
   * get_contenu
   *
   * @return contenu du blogpost
   */
  public function get_contenu() {
    return $this->contenu;
  }
  
  /**
   * get_auteur
   *
   * @return auteur du blogpost
   */
  public function get_auteur() {
    return $this->auteur;
  }
  
  /**
   * get_date
   *
   * @return date du blogpost
   */
  public function get_date() {
    return $this->date;
  }
  
  /**
   * get_photo_url
   *
   * @return chemin d'acces de la photo du blogpost
   */
  function get_photo_url() {
    return $this->photo_url;
  }
  
}
