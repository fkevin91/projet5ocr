<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/model.php';
// On instancie une connexion

class RegistrationController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function displayRegistration() {
        try {
            $template = $this->twig->load('registration.html.twig');
            //$affichageRegistration = new connectionBDD();
            //$Registration = $affichageRegistration->get_Registration_by_id($id);
            //$titre = "Connexion";
            echo $template->render(array(
            //    'titre' => $titre,
            //    'Registration' => $Registration,
            ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}