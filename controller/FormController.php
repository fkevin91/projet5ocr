<?php
require_once '../vendor/autoload.php';

include '../model/Model.php';
include '../model/Utilisateur.php';
include '../model/Article.php';

class FormController{

    public function recuperation_du_formulaire(){
        $formulaire = new Utilisateur();
        switch ($_POST['formulaire']){
            case 'addPost':
                $formulaire = new Article();
                $formulaire->create($_POST['titre'],$_POST['contenu'],$_POST['photo_url'], date("Y-m-d H:i:s"),$_POST['user_iduser']);
                header('location:../public/homeback?back=homeback');
                break;
            case 'updatePost':
                $formulaire = new Article();
                $formulaire->update_post($_POST['titre'],$_POST['contenu'],$_POST['photo_url'],$_POST['date_creation'],$_POST['user_iduser'], $_POST['idblogpost']);
                header('location:../public/home.php');
                break;
            case 'registration':
                $formulaire = new Utilisateur();
                $formulaire->create($_POST['pseudo'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['password']);
                header('location:../public/home.php');
                break;
            case 'log':
                $formulaire = new User();
                $bool = $formulaire->connect($_POST['pseudo'],$_POST['password']) ;
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



