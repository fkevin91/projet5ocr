<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/Model.php';
include '../model/Article.php';
// On instancie une connexion

class PostController {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayPost($id) {
        try {
            $template = $this->twig->load('post.html.twig');
            $affichagePost = new App\models\Post();
            $post = $affichagePost->show($id);
            $titre = "Post";
                echo $template->render(array(
                    'titre' => $titre,
                    'post' => $post,
                ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function displayListPost() {
        try {
            $template = $this->twig->load('listpost.html.twig');
            $affichageListPost = new App\models\Post();
            $listpost = $affichageListPost->all();
            $titre = "listPost";
            echo $template->render(array(
                'titre' => $titre,
                'listpost' => $listpost,
            ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}