<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/Model.php';
include '../model/Utilisateur.php';
// On instancie une connexion

class LogController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function displayLog() {
        try {
            $template = $this->twig->load('log.html.twig');
            //$affichageLog = new connectionBDD();
            //$log = $affichageLog->get_Log_by_id($id);
            //$titre = "Connexion";
            echo $template->render(array(
            //    'titre' => $titre,
            //    'log' => $log,
            ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}