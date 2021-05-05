<?php
require_once '../vendor/autoload.php';

include '../entities/User.php';
include '../entities/Post.php';
include '../model/Model.php';
include '../model/User.php';
include '../model/Article.php';

class FormController{

    public function recuperation_du_formulaire($tab){
        switch ($tab['formulaire']){
            case 'addPost':
                $formulaire = new App\Entities\Post($tab['titre'],$tab['contenu'],$tab['photo_url'], date("Y-m-d H:i:s"), $_SESSION['Auth']['iduser']);
                $formulaire->set_blogpost();
                header('location:../public/homeback?back=homeback');
                break;
            case 'updatePost':
                $formulaire = new App\models\Post();
                $formulaire->update($tab['titre'],$tab['contenu'],$tab['photo_url'],$tab['date_creation'],$tab['user_iduser'], $tab['idblogpost']);
                header('location:../public/home.php');
                break;
            case 'registration':
                $formulaire = new App\models\User();
                $formulaire->create($tab['pseudo'],$tab['nom'],$tab['prenom'],$tab['mail'],$tab['password']);
                header('location:../public/home.php');
                break;
            case 'log':
                $formulaire = new App\models\User();
                $bool = $formulaire->check($tab['pseudo'],$tab['password']) ;
                if($bool){
                    $_SESSION['Auth'] = array(
                        'login' => $tab['pseudo'],
                        'pass' => sha1($tab['password']),
                        'role' => ''
                    );
                    header('location:../public/homeback?back=homeback');
                }
                else{
                    header('location:../public/home');
                }
                break;
        }
    }
}



