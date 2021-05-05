<?php
require_once '../vendor/autoload.php';

include '../entities/User.php';
include '../entities/Blogpost.php';
include '../model/Model.php';
include '../model/Utilisateur.php';
include '../model/Article.php';

class FormController{

    public function recuperation_du_formulaire($tab, $tab2){
        switch ($tab['formulaire']){
            case 'addPost':
                $formulaire = new App\Entities\Post($tab['titre'],$tab['contenu'],$tab['photo_url'], date("Y-m-d H:i:s"), $tab2['Auth']['iduser']);
                $formulaire->set_blogpost();
                header('location:../public/homeback?back=homeback');
                break;
            case 'updatePost':
                $formulaire = new App\models\Article();
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
                    header('location:../public/homeback?back=homeback');
                }
                else{
                    header('location:../public/home');
                }
                break;
        }
    }
}



