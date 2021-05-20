<?php

use App\Entities\Post;
use App\Entities\User;


class FormController{

    public function recuperation_du_formulaire($tab){
        switch ($tab['formulaire']){
            case 'addPost': // ok
                $formulaire = new Post();
                $formulaire->set_titre($tab['titre']);
                $formulaire->set_contenu($tab['contenu']);
                $formulaire->set_photo_url($tab['photo_url']);
                $formulaire->set_date(date("Y-m-d H:i:s"));
                $formulaire->set_auteur($_SESSION['Auth']['iduser']);
                $formulaire->create();
                header('location:../public/homeback?back=homeback');
                break;

            case 'updatePost': // ok
                if (empty($tab['photo_url'])){
                    $photo = $tab['photo'];
                }else{
                    $photo = $tab['photo_url'];
                }
                $formulaire = new Post();
                $formulaire->set_titre($tab['titre']);
                $formulaire->set_contenu($tab['contenu']);
                $formulaire->set_photo_url($photo);
                $formulaire->set_date(date($tab['date_creation']));
                $formulaire->set_auteur($_SESSION['Auth']['iduser']);
                $formulaire->update($tab['idblogpost']);
                header('location:../public/homeback?back=homeback');
                break;

            case 'registration': // ok 
                $formulaire = new User($tab['pseudo'], $tab['password']);
                $formulaire->set_nom($tab['nom']);
                $formulaire->set_prenom($tab['prenom']);
                $formulaire->set_mail($tab['mail']);
                $resultat = $formulaire->create();
                if($resultat){
                    header('location:../public/user?user=1');
                }
                break;

            case 'log': // ok
                $formulaire = new User($tab['pseudo'],$tab['password']);
                $bool = $formulaire->check();
                if(isset($bool)){
                    $_SESSION['Auth'] = $bool;
                    header('location:../public/homeback?back=homeback');
                }
                else{
                    header('location:../public/home');
                }
                break;
        }
    }
}



