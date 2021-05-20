<?php
namespace App\Controller;

use App\Entities\Post;



class HomebackController extends Controller{


    public function displayHomeBack(){ // ok
        try {
            $template = $this->twig->load('backof.html.twig');
            echo $template->render(array());
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackAddPost(){ // ok
        try {
            $template = $this->twig->load('backaddpost.html.twig');
            echo $template->render(array());
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackListPost($tab){ // ok
        try {
            $template = $this->twig->load('backlistpost.html.twig');
            $affichageListPost = new Post();
            $listpost = $affichageListPost->allById($tab['Auth']['iduser']);
            $titre = "listPost";
            echo $template->render(array(
                'titre' => $titre,
                'listpost' => $listpost,
            ));
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackDelPost(){ // A FAIRE
        // a faire
    }
    public function displayBackUpdatePost($id){ // ok
        try {
            $template = $this->twig->load('backupdatepost.html.twig');
            $affichagePost = new Post();
            $post = $affichagePost->show($id);
            $titre = "Post";
                echo $template->render(array(
                    'titre' => $titre,
                    'post' => $post,
                ));
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}