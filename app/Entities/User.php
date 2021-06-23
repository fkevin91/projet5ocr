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
  public function set_id($id){
    $this->id = $id;
  }
  public function set_pseudo($pseudo){
    $this->pseudo = $pseudo;
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
  public function set_password($password){
    $this->password = $password;
  }
  
  //Getteurs
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
  /**
   * get_password
   *
   * @return password utilisateur
   */
  public function get_password() {
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
    $this->set_id($data['iduser']);
    $this->set_pseudo($data['pseudo']);
    $this->set_nom($data['nom']);
    $this->set_prenom($data['prenom']);
    $this->set_mail($data['mail']);
    $this->set_password($data['password']);
  }

  public function securityPass($data){
    if($data == false){
      return;
    }
    $this->set_pseudo($data['pseudo']);
    $this->set_password($data['password']);
  }
}