<?php
namespace App\Controller;
use App\Entities\Post;
use App\Entities\User;
use App\Entities\Comment;
use App\Model\Post as PostModel;
use App\Model\User as UserModel;
use App\Model\Comment as CommentModel;
use PHPMailer\PHPMailer\PHPMailer;

class FormController{
    public function controle($image,$cheminEtNomDefinitif){
        $extValide = array("jpg", "jpeg", "png", "gif");
        $message = 'ok';
        if (!empty($image)){
            if(is_uploaded_file($image)){
                $typemime=mime_content_type($image);
                $typemime = substr (strrchr ($typemime, "/" ), 1);
                $typemime=strtolower($typemime);
                if(in_array($typemime,$extValide)){
                    $moveIsOk = move_uploaded_file($image, $cheminEtNomDefinitif);
                    if ($moveIsOk){
                        return $message = "la photo a bien été téléchargé ";
                    } else {
                        return $message = "suite à une erreur la photo n'a pas pu etre téléchargé ";
                    }
                }else {
                    return $message = "le fichier que vous essayer de téléchargé est un fichier " . $typemime . "<br> votre fichier n'est pas une photo ou image ! ";
                }
            }else{
                return $message = "Un probleme a eu lieu lors du téléchargement ";
            }
        }else {
            return $message = "Aucune image à téléchargé ! ";
        }
        return $message;
    }
    
    public function recuperationDuFormulaire($tab,$fichier){
        switch ($tab['formulaire']){
            case 'addPost': // ok
                $image = $fichier['photo_url']['tmp_name'];
                $cheminEtNomDefinitif = '../public/upload/'.$fichier['photo_url']['name'];
                $this->controle($image,$cheminEtNomDefinitif);
                $tab['date_creation']= date("d-m-Y");
                $tab['user_iduser']= $_SESSION['Auth']['iduser'];
                $tab['photo_url'] = $cheminEtNomDefinitif;
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

            case 'contact':
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = 'e4e853f290db7c';
                $mail->Password = '27231a11ef4cf1';
                $mail->setFrom($tab['mail'], 'Mailer');
                $mail->addAddress('k.fardeau123@gmail.com', 'kevin fardeau');
                $mail->isHTML(true);
                $mail->Subject = 'Formaulaire de contact : '.$tab['name'];
                $mail->Body    = 'De la part de : '.$tab['name'].'<br>'.$tab['contenu'];
                $mail->AltBody = $tab['contenu'];
                $mail->send();
                echo 'Message has been sent';
                header('location:../public/home');
                break;
        }
    }

}
