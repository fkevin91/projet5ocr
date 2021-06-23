<?php
namespace App\Entities;
use App\Model\Post as PostModel;
class Post {
  // Properties
  private $id;
  private $titre;
  private $contenu;
  private $auteur;
  private $date;
  private $photo_url;

  // Methods
  public function __get($name)
  {
    $method = 'get_'.$name;
    return $this->$method();
  }
  
  public function set_id($id)
  {
    $this->id = $id;
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

  
  /**
   * set_blogpost
   *
   */
  /* public function create() {
    $model = new PostModel();
    $model->create(
      $this->get_titre(),
      $this->get_contenu(),
      $this->get_photo_url(), // ne peut etre nul
      $this->get_date(),
      $this->get_auteur()
    );
  } */



  /**
   * get_id
   *
   * @return id du blogpost
   */
  public function get_id() {
    return $this->id;
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
  public function get_photo_url() {
    return $this->photo_url;
  }
  

  public function hydrate($data){
    if($data == false){
      return;
    }
    if(!array_key_exists('idblogpost', $data)){
      $data['idblogpost']=0;
    }
    $this->set_id($data['idblogpost']);
    $this->set_titre($data['titre']);
    $this->set_contenu($data['contenu']);
    $this->set_photo_url($data['photo_url']);
    $this->set_date($data['date_creation']);
    $this->set_auteur($data['user_iduser']);
  }
}
