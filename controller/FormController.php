<?php
require_once '../vendor/autoload.php';
include '../model/model.php';

class FormController{

    public function recuperation_du_formulaire(){
        $formulaire = new connectionBDD();
        switch ($_POST['formulaire']){
            case 'addPost':
                $formulaire->add_post($_POST['titre'],$_POST['contenu'],$_POST['photo_url'], date("Y-m-d H:i:s"),$_POST['user_iduser']);
                header('location:../public/homeback?back=homeback');
                break;
            case 'updatePost':
                $formulaire->update_post($_POST['titre'],$_POST['contenu'],$_POST['photo_url'],$_POST['date_creation'],$_POST['user_iduser'], $_POST['idblogpost']);
                header('location:../public/home.php');
                break;
            case 'registration':
                $formulaire->add_user($_POST['pseudo'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['password']);
                header('location:../public/home.php');
                break;
            case 'log':
                $bool = $formulaire->connect_user($_POST['pseudo'],$_POST['password']) ;
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



