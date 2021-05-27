<?php

namespace App\Entities;
use App\Model\User as UserModel;

class User {
  // Properties
  private $id;
  private $pseudo;
  private $nom;
  private $prenom;
  private $mail;
  private $password;

  // Methods
  
  /**
   * __construct
   *
   * @param  string $pseudo
   * @param  string $password
   * @return void
   */
  public function __construct($pseudo, $password) {
    $this->pseudo = $pseudo;
    $this->password = $password;
  }
  public function set_nom($nom){
    $this->nom = $nom;
  }
  public function set_prenom($prenom){
    $this->prenom = $prenom;
  }
  public function set_mail($mail){
    $this->mail = $mail;
  }
  public function create(){
    $ajout = new UserModel();
    $resultat = $ajout->create(
      $this->pseudo,
      $this->nom,
      $this->prenom,
      $this->mail,
      $this->password,
    );
    return $resultat;
  }
  public function check() {
    $verif = new UserModel();
    $resultat= $verif->check($this->pseudo, $this->password);
    if(isset($resultat)){
      return $resultat;
    }else{
      return false;
    }
  }
  /**
   * get_id
   *
   * @return id utilitateur
   */
  public function get_id() {
    return $this->id;
  }
  /**
   * get_pseudo
   *
   * @return pseudo utilitateur
   */
  public function get_pseudo() {
    return $this->pseudo;
  }
  /**
   * get_nom
   *
   * @return nom utilisateur
   */
  public function get_nom() {
    return $this->nom;
  }
  /**
   * get_prenom
   *
   * @return prenom utilisateur
   */
  public function get_prenom() {
    return $this->prenom;
  }
  /**
   * get_mail
   *
   * @return mail utilisateur
   */
  public function get_mail() {
    return $this->mail;
  }
}
