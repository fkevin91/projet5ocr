<?php
namespace App\Controller;

use App\Entities\Post;
use App\Model\Post as PostModel;
use App\Model\Comment as CommentModel;

class HomebackController extends Controller{


    public function displayHomeBack(){ 
        try {
            $template = $this->twig->load('backof.html.twig');
            echo $template->render(array());
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackAddPost($token){ 
        try {
            $template = $this->twig->load('backaddpost.html.twig');
            echo $template->render(array(
                'token' => $token
            ));
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function ListPostAdmin(){ 
        try {
            $template = $this->twig->load('backlistpost.html.twig');
            $model = new PostModel();
            $listpost = $model->all();
            $titre = "listPost";
            echo $template->render(array(
                'titre' => $titre,
                'listpost' => $listpost,
            ));
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackListPost($tab){ 
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
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function DeletePostWithComments($idblogpost){ 
        try {
            (new CommentModel())->delByIdComment($idblogpost);
            (new PostModel())->delete($idblogpost);
            header('location:../public/homeback?back=homebackList');
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function validationCommentaire($idcomment){ 
        try {
            (new CommentModel())->validation($idcomment);
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayBackUpdatePost($idblogpost, $tab){ 
        try {
            $model = new PostModel();
            if($tab['Auth']['iduser'] != 1){
                $listpost = $model->listPostAutorise($tab['Auth']['iduser']);
                if (!in_array($idblogpost, $listpost)){
                    header('location:../public/homeback?back=homeback');
                }
            }
            $template = $this->twig->load('backupdatepost.html.twig');
            $post = $model->find($idblogpost);
            $modelComment = new CommentModel();
            $commentsvalide = $modelComment->allByBlogPostIsApprouve($idblogpost);
            $commentsnotvalide = $modelComment->allByBlogPostIsNotApprouve($idblogpost);
            // var_dump($commentsnotvalide);
            $titre = "Post";
                echo $template->render(array(
                    'titre' => $titre,
                    'post' => $post,
                    'commentsvalide'=> $commentsvalide,
                    'commentsnotvalide'=> $commentsnotvalide,
                ));
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
}