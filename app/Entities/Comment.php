<?php
namespace App\Entities;
use App\Model\Comment as PostModel;
class Post {
  // Properties
    private $idComment;
    private $date;
    private $contenu;
    private $isApprouve;
    private $user;
    private $blogpost;
    private $autheur;
  
  // Methods
  public function set_idComment($idComment)
  {
    $this->idComment = $idComment;
  }
  public function get_idComment() {
    return $this->idComment;
  }
  
  public function set_date($date)
  {
    $this->date = $date;
  }
  public function get_date() {
    return $this->date;
  }

  public function set_contenu($contenu)
  {
    $this->contenu = $contenu;
  }
  public function get_contenu() {
    return $this->contenu;
  }

  public function set_isApprouve($isApprouve)
  {
    $this->isApprouve = $isApprouve;
  }
  public function get_isApprouve() {
    return $this->isApprouve;
  }

  public function set_user($user)
  {
    $this->user = $user;
  }
  public function get_user() {
    return $this->user;
  }

  public function set_blogpost($blogpost)
  {
    $this->blogpost = $blogpost;
  }
  public function get_blogpost() {
    return $this->blogpost;
  }

  public function set_autheur($autheur)
  {
    $this->autheur = $autheur;
  }
  public function get_autheur() {
    return $this->autheur;
  }


}
