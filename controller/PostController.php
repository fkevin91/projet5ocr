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
            $affichagePost = new App\models\Article();
            $post = $affichagePost->get_post_by_id($id);
            $titre = "Post";
            if (!empty($post)){
                echo $template->render(array(
                    'titre' => $titre,
                    'post' => $post,
                ));
                
            }else{
                $post = [
                    'idinfAccueil' =>'0',
                    'nom' =>'0',
                    'prenom' =>'0',
                    'phrase_accroche' =>'0',
                    'github' =>'0',
                    'twitter' =>'0',
                    'linkedin' =>'0'
                ];
                echo $template->render(array(
                    'titre' => 'erreur',
                    'post' => $post,
                ));
            }
        
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}