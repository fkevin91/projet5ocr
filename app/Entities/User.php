<?php

namespace App\Entities;
use App\Model\User as UserModel;

class User {
  // Properties
  private $idr;
  private $pseudo;
  private $nom;
  private $prenom;
  private $mail;
  private $password;

  /**
   * __construct
   *
   * @param  string $pseudo
   * @param  string $password
   * @return void
   */
  /* public function __construct($pseudo, $password) {
    $this->pseudo = $pseudo;
    $this->password = $password;
  } */

  //Setteurs
  public function setId($idr){
    $this->idr = $idr;
  }
  public function setPseudo($pseudo){
    $this->pseudo = $pseudo;
  }
  public function setNom($nom){
    $this->nom = $nom;
  }
  public function setPrenom($prenom){
    $this->prenom = $prenom;
  }
  public function setMail($mail){
    $this->mail = $mail;
  }
  public function setPassword($password){
    $this->password = $password;
  }
  
  //Getteurs
  /**
   * get_id
   *
   * @return id utilitateur
   */
  public function getId() {
    return $this->idr;
  }
  /**
   * get_pseudo
   *
   * @return pseudo utilitateur
   */
  public function getPseudo() {
    return $this->pseudo;
  }
  /**
   * get_nom
   *
   * @return nom utilisateur
   */
  public function getNom() {
    return $this->nom;
  }
  /**
   * get_prenom
   *
   * @return prenom utilisateur
   */
  public function getPrenom() {
    return $this->prenom;
  }
  /**
   * get_mail
   *
   * @return mail utilisateur
   */
  public function getMail() {
    return $this->mail;
  }
  /**
   * get_password
   *
   * @return password utilisateur
   */
  public function getPassword() {
    return $this->password;
  }

  // Methods
  public function hydrate($data){
    if($data == false){
      return;
    }
    if(!array_key_exists('iduser', $data)){
      $data['iduser']=0;
    }
    $this->setId($data['iduser']);
    $this->setPseudo($data['pseudo']);
    $this->setNom($data['nom']);
    $this->setPrenom($data['prenom']);
    $this->setMail($data['mail']);
    $this->setPassword($data['password']);
  }

  public function securityPass($data){
    if($data == false){
      return;
    }
    $this->setPseudo($data['pseudo']);
    $this->setPassword($data['password']);
  }
}