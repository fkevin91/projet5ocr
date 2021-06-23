<?php
namespace App\Controller;

use App\Entities\Post;
use App\Model\Post as PostModel;



class PostController extends Controller {

    public function displayPost($id) { // ok
        try {
            $template = $this->twig->load('post.html.twig');
            $model = new PostModel();
            $post = $model->find($id);
            $titre = "Post";
                echo $template->render(array(
                    'titre' => $titre,
                    'post' => $post,
                ));
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayListPost() { // ok
        try {
            $template = $this->twig->load('listpost.html.twig');
            $model = new PostModel();
            $listpost = $model->all();
            $titre = "listPost";
            echo $template->render(array(
                'titre' => $titre,
                'listpost' => $listpost,
            ));
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}