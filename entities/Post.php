<?php
namespace App\Entities;

class Post {
  // Properties
  private $titre;
  private $contenu;
  private $auteur;
  private $date;
  private $photo_url;

  // Methods
  
  /**
   * __construct
   *
   * @param  string $titre
   * @param  string $contenu
   * @param  string $auteur
   * @param  string $date
   * @param  string $photo_url
   * @return void
   */
  public function __construct() {

  }

  public function set_titre($titre)
  {
    $this->titre = $titre;
  }
  public function set_contenu($contenu)
  {
    $this->contenu = $contenu;
  }
  public function set_photo_url($photo_url)
  {
    $this->photo_url = $photo_url;
  }
  public function set_date($date)
  {
    $this->date = $date;
  }
  public function set_auteur($auteur)
  {
    $this->auteur = $auteur;
  }

  function allById($user){
    $selectAll = new \App\models\Post();
    $resultat = $selectAll->allById($user);
    return $resultat;
  }

  function all(){
    $selectAll = new \App\models\Post();
    $resultat = $selectAll->all();
    return $resultat;
  }

  function show($id){
    $select = new \App\models\Post();
    $resultat = $select->show($id);
    return $resultat;
  }
  
  /**
   * set_blogpost
   *
   */
  public function create() {
    $a = new \App\models\Post();
    $a->create(
      $this->get_titre(),
      $this->get_contenu(),
      $this->get_photo_url(), // ne peut etre nul
      $this->get_date(),
      $this->get_auteur()
    );
  }

  /**
   * update_blogpost
   *
   */
  public function update($idblogpost) {
    $a = new \App\models\Post();
    $a->update(
      $this->get_titre(),
      $this->get_contenu(),
      $this->get_photo_url(),
      $this->get_date(),
      $this->get_auteur(), 
      $idblogpost
    );

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
