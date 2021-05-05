<?php

namespace App\Entities;

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
   * @param  string $nom
   * @param  string $prenom
   * @param  string $mail
   * @param  string $password
   * @return void
   */
  public function create($id, $pseudo, $nom, $prenom, $mail, $password) {
    $this->id = $id;
    $this->pseudo = $pseudo;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->password = $password;
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
  
  public function check($pseudo, $password) {
    $a = new \App\models\User;
    $r= $a->check($pseudo, $password);
    if($r){
      $this->create($r['iduser'],$r['pseudo'], $r['nom'], $r['prenom'], $r['mail'], $r['password']);
      $_SESSION['Auth'] = array(
          'login' => $r['pseudo'],//$this->get_pseudo(),
          'pass' => $r['password'],
          'id' => $r['iduser'],//$this->get_id() ,
          'role' => ''
      );
      return true;
    }else{
      return true;
    }
  }
}
