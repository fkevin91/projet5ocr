<?php
namespace App\Controller;

use App\Entities\Post;


class PostController extends Controller {

    public function displayPost($id) { // ok
        try {
            $template = $this->twig->load('post.html.twig');
            $affichagePost = new Post();
            $post = $affichagePost->show($id); // [0];
            // var_dump($post);
            // var_dump($post->titre);
            // $test = new \App\Model\Post();
            // $post=$test->find($id)[0];
            // var_dump($post);
            // var_dump($post->get_titre());
            // die();
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
            $affichageListPost = new Post();
            $listpost = $affichageListPost->all();
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