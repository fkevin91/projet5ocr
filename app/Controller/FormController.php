<?php
namespace App\Controller;
use App\Entities\Post;
use App\Entities\User;
use App\Entities\Comment;
use App\Model\Post as PostModel;
use App\Model\User as UserModel;
use App\Model\Comment as CommentModel;


class FormController{

    public function recuperationDuFormulaire($tab){
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
                    $_SESSION['Auth']['role'] = 'user';
                    if($_SESSION['Auth']['pseudo'] == 'admin'&& $_SESSION['Auth']['iduser'] == 1){
                        $_SESSION['Auth']['role'] = 'admin';
                    }

                    header('location:../public/homeback?back=homeback');
                }
                if(!isset($result)){
                    header('location:../public/home');
                }
                break;

            case 'addComment': // A BRANCHER
                $entity = new Comment();
                $entity->hydrate($tab);
                $model = new CommentModel();
                $model->create($entity);
                /*var_dump($model->create($entity));
                var_dump($entity);
                var_dump($model);
                die();*/
                header('location:../public/post?idblogpost='.$tab['blogpost_idblogpost']);
                break;

            case 'contact': // A BRANCHER
                $too      = 'k.fardeau123@gmail.com';
                $subject = 'Formaulaire de contact : '.$tab['name'];
                $message = $tab['contenu'];
                $headers = array(
                    'From' => $tab['mail'],
                    'Reply-To' => $tab['mail'],
                    'X-Mailer' => 'PHP/' . phpversion()
                );
                mail($too, $subject, $message, $headers);

                header('location:../public/home');
                break;
        }
    }
}