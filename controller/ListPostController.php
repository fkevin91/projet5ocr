<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/model.php';
// On instancie une connexion

class ListPostController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function displayListPost() {
        //try {
            $template = $this->twig->load('listpost.html.twig');
            $affichageListPost = new connectionBDD();
            $listpost = $affichageListPost->get_all_post();
            $titre = "listPost";
            echo $template->render(array(
                'titre' => $titre,
                'listpost' => $listpost,
            ));
        //} catch (Exception $e) {
            //die ('ERROR: ' . $e->getMessage());
        //}
    }
}