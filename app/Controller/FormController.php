<?php
namespace App\Controller;
use App\Entities\Post;
use App\Entities\User;
use App\Entities\Comment;
use App\Model\Post as PostModel;
use App\Model\User as UserModel;
use App\Model\Comment as CommentModel;


class FormController{

    public function recuperation_du_formulaire($tab){
        switch ($tab['formulaire']){
            case 'addPost': // ok
                $tab['date_creation']= date("Y-m-d H:i:s");
                $tab['user_iduser']= $_SESSION['Auth']['iduser'];
                $entity =new Post();
                $entity->hydrate($tab);
                $model = new PostModel();
                $model->create($entity);
                header('location:../public/homeback?back=homeback');
                break;
        
            case 'updatePost': // ok
                if (empty($tab['photo_url'])){
                    $tab['photo_url'] = $tab['photo'];
                }
                $entity = new Post();
                $entity->hydrate($tab);
                $model = (new PostModel())->update($entity);
                header('location:../public/homeback?back=homeback');
                break;

            case 'registration': // ok 
                $entity = new User();
                $entity->hydrate($tab);
                $model = new UserModel();
                $result = $model->create($entity);
                if($result){
                    header('location:../public/user?user=1');
                }
                break;

            case 'log': // ok
                $entity = new User();
                $entity->securityPass($tab);
                $model = new UserModel();
                $result = $model->check($entity);
                if(isset($result)){
                    $_SESSION['Auth'] = $result;
                    header('location:../public/homeback?back=homeback');
                }
                else{
                    header('location:../public/home');
                }
                break;

            case 'addComment': // A BRANCHER
                $entity = new Comment();
                $entity->hydrate($tab);
                $model = new CommentModel();
                $model->create($entity);
                header('location:../public/homeback?back=homeback');
                break;
        }
    }
}