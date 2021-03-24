<?php

class User {
  // Properties
  private $pseudo;
  private $name;
  private $firstName;
  private $mail;
  private $password;

  // Methods
  
  /**
   * __construct
   *
   * @param  string $pseudo
   * @param  string $name
   * @param  string $firstName
   * @param  string $mail
   * @param  string $password
   * @return void
   */
  public function __construct($pseudo, $name, $firstName, $mail, $password) {
    $this->pseudo = $pseudo;
    $this->name = $name;
    $this->firstName = $firstName;
    $this->mail = $mail;
    $this->password = sha1($password);
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
   * get_name
   *
   * @return nom utilisateur
   */
  public function get_name() {
    return $this->name;
  }
  
  /**
   * get_firstName
   *
   * @return prenom utilisateur
   */
  public function get_firstName() {
    return $this->firstName;
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
