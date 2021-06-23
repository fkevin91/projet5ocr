<?php
namespace App\Controller;

use App\Entities\Post;
use App\Model\Post as PostModel;


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
            $model = new PostModel();
            $listpost = $model->allForUser($tab['Auth']['iduser']);
            $titre = "listPost";
            echo $template->render(array(
                'titre' => $titre,
                'listpost' => $listpost,
            ));
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackDelPost($id){ 
        try {
            (new PostModel())->delete($id);
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackUpdatePost($id){ // ok
        try {
            $template = $this->twig->load('backupdatepost.html.twig');
            $model = new PostModel();
            $post = $model->find($id);
            var_dump($post);
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