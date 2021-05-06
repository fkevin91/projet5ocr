<?php

use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/Model.php';
include '../model/Post.php';
// On instancie une connexion

class PostController {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayPost($id) { // ok
        try {
            $template = $this->twig->load('post.html.twig');
            $affichagePost = new App\Entities\Post();
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
    public function displayListPost() { // ok
        try {
            $template = $this->twig->load('listpost.html.twig');
            $affichageListPost = new App\Entities\Post();
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