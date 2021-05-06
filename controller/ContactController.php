<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/model.php';
// On instancie une connexion

class ContactController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayContact() {
        try {
            $template = $this->twig->load('contact.html.twig');
            $titre = "Contact";
            echo $template->render(array(
                'titre' => $titre,
            ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}