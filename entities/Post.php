<?php
namespace App\Entities;

class Post {
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
  public function __construct($titre, $contenu, $photo_url, $date, $auteur) {

    $this->titre = $titre;
    $this->contenu = $contenu;
    $this->auteur = $auteur;
    $this->date = $date;
    $this->photo_url = $photo_url;
  }
  
  /**
   * set_blogpost
   *
   */
  public function set_blogpost() {
    $a = new \App\models\Article();
    $a->create(
      $this->get_titre(),
      $this->get_contenu(),
      $this->get_photo_url(),
      $this->get_date(),
      $this->get_auteur()
    );
  }


  /**
   * update_blogpost
   *
   */
  public function update_blogpost($idblogpost) {
    $a = new \App\models\Article();
    $a->update($this->get_titre(),$this->get_contenu(),$this->get_photo_url(),$this->get_date(),$this->get_auteur(), $idblogpost);

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
