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
    $this->setIdComments($data['idcomments']);
    $this->setDate($data['date']);
    $this->setContenu($data['contenu']);
    $this->setIsApprouve($data['isApprouve']);
    $this->setUser($data['user_iduser']);
    $this->setBlogpost($data['blogpost_idblogpost']);
    $this->setAuteur($data['autheur']);
  }
  
  // Setteurs && Getteurs
  public function setIdComments($idComments){
    $this->idComments = $idComments;
  }
  public function getIdComments() {
    return $this->idComments;
  }
  
  public function setDate($date){
    $this->date = $date;
  }
  public function getDate() {
    return $this->date;
  }

  public function setContenu($contenu){
    $this->contenu = $contenu;
  }
  public function getContenu() {
    return $this->contenu;
  }

  public function setIsApprouve($isApprouve){
    $this->isApprouve = $isApprouve;
  }
  public function getIsApprouve() {
    return $this->isApprouve;
  }

  public function setUser($user){
    $this->user = $user;
  }
  public function getUser() {
    return $this->user;
  }

  public function setBlogpost($blogpost){
    $this->blogpost = $blogpost;
  }
  public function getBlogpost() {
    return $this->blogpost;
  }

  public function setAuteur($auteur){
    $this->auteur = $auteur;
  }
  public function getAuteur() {
    return $this->auteur;
  }


}
