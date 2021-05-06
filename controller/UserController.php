<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/Model.php';
include '../model/User.php';
// On instancie une connexion

class UserController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayLog() {
        try {
            $template = $this->twig->load('log.html.twig');
            echo $template->render(array());
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayRegistration() {
        try {
            $template = $this->twig->load('registration.html.twig');
            echo $template->render(array());
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}