<?php
namespace App\Entities;
use App\Model\Post as PostModel;
class Post {
  // Properties
  private $idr;
  private $titre;
  private $contenu;
  private $auteur;
  private $date;
  private $photoUrl;

  // Methods
  public function __get($name)
  {
    $method = 'get_'.$name;
    return $this->$method();
  }
  
  public function setId($idr)
  {
    $this->idr = $idr;
  }
  public function setTitre($titre)
  {
    $this->titre = $titre;
  }
  public function setContenu($contenu)
  {
    $this->contenu = $contenu;
  }
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function setAuteur($auteur)
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
      $this->get_photoUrl(), // ne peut etre nul
      $this->get_date(),
      $this->get_auteur()
    );
  } */



  /**
   * get_id
   *
   * @return id du blogpost
   */
  public function getId() {
    return $this->idr;
  }
  /**
   * get_titre
   *
   * @return titre du blogpost
   */
  public function getTitre() {
    return $this->titre;
  }
  
  /**
   * get_contenu
   *
   * @return contenu du blogpost
   */
  public function getContenu() {
    return $this->contenu;
  }
  
  /**
   * get_auteur
   *
   * @return auteur du blogpost
   */
  public function getAuteur() {
    return $this->auteur;
  }
  
  /**
   * get_date
   *
   * @return date du blogpost
   */
  public function getDate() {
    return $this->date;
  }
  
  /**
   * get_photoUrl
   *
   * @return chemin d'acces de la photo du blogpost
   */
  public function getPhotoUrl() {
    return $this->photoUrl;
  }
  

  public function hydrate($data){
    if($data == false){
      return;
    }
    if(!array_key_exists('idblogpost', $data)){
      $data['idblogpost']=0;
    }
    $this->setId($data['idblogpost']);
    $this->setTitre($data['titre']);
    $this->setContenu($data['contenu']);
    $this->setPhotoUrl($data['photo_url']);
    $date = date_create($data['date_creation']);
    $this->setDate(date_format($date, 'd-m-Y'));
    $this->setAuteur($data['user_iduser']);
  }
}
