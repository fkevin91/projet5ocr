<?php
namespace App\Controller;

use App\Entities\Post;
use App\Model\Post as PostModel;
use App\Model\Comment as CommentModel;



class PostController extends Controller {

    public function displayPost($id) { // ok
        try {
            $template = $this->twig->load('post.html.twig');
            $modelPost = new PostModel();
            $post = $modelPost->find($id);
            $modelComment = new CommentModel();
            $comments = $modelComment->allByBlogPostIsApprouve($id);
            // var_dump($comments);
            $titre = "Post";
                echo $template->render(array(
                    'titre' => $titre,
                    'post' => $post,
                    'comments'=> $comments,
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