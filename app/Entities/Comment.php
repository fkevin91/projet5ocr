<?php
namespace App\Entities;
use App\Model\Comment as PostModel;
class Comment {
  // Properties
    private $idComments;
    private $date;
    private $contenu;
    private $isApprouve;
    private $user;
    private $blogpost;
    private $auteur;

  // Methods

  public function hydrate($data){
    if($data == false){
      return;
    }
    if(!array_key_exists('idcomments', $data)){
      $data['idcomments']=0;
    }
    if(!array_key_exists('date', $data)){
      $data['date']= null;
    }
    if(!array_key_exists('isApprouve', $data)){
      $data['isApprouve']=0;
    }
    $this->set_idComments($data['idcomments']);
    $this->set_date($data['date']);
    $this->set_contenu($data['contenu']);
    $this->set_isApprouve($data['isApprouve']);
    $this->set_user($data['user_iduser']);
    $this->set_blogpost($data['blogpost_idblogpost']);
    $this->set_auteur($data['autheur']);
  }
  
  // Setteurs && Getteurs
  public function set_idComments($idComments){
    $this->idComments = $idComments;
  }
  public function get_idComments() {
    return $this->idComments;
  }
  
  public function set_date($date){
    $this->date = $date;
  }
  public function get_date() {
    return $this->date;
  }

  public function set_contenu($contenu){
    $this->contenu = $contenu;
  }
  public function get_contenu() {
    return $this->contenu;
  }

  public function set_isApprouve($isApprouve){
    $this->isApprouve = $isApprouve;
  }
  public function get_isApprouve() {
    return $this->isApprouve;
  }

  public function set_user($user){
    $this->user = $user;
  }
  public function get_user() {
    return $this->user;
  }

  public function set_blogpost($blogpost){
    $this->blogpost = $blogpost;
  }
  public function get_blogpost() {
    return $this->blogpost;
  }

  public function set_auteur($auteur){
    $this->auteur = $auteur;
  }
  public function get_auteur() {
    return $this->auteur;
  }


}
