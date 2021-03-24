<?php
class User {
  // Properties
  public $pseudo;
  public $name;
  public $firstName;
  public $mail;
  public $password;

  // Methods

  function __construct($pseudo, $name, $firstName, $mail, $password) {
    $this->pseudo = $pseudo;
    $this->name = $name;
    $this->firstName = $firstName;
    $this->mail = $mail;
    $this->password = $password;
  }

  function get_pseudo() {
    return $this->pseudo;
  }

  function get_name() {
    return $this->name;
  }

  function get_firstName() {
    return $this->firstName;
  }

  function get_mail() {
    return $this->mail;
  }
  
}
