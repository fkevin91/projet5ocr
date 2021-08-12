<?php
namespace App\Model;
use App\Entities\Post as PostEntity;
class Post extends Model{

        function delete($idr)
        {
            $sql="DELETE FROM blogpost where idblogpost=:id";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':id', $idr, \PDO::PARAM_INT);
            $stmt->execute();
        }
        /** Récupére la liste des posts sous forme d'un tableau */
        function all()
        {
            $sql="SELECT * FROM blogpost ORDER BY idblogpost DESC";
            $data=self::$connexion->query($sql);
            $data = $data->fetchAll(\PDO::FETCH_ASSOC);
            $posts = [];
            foreach($data as $item){
                $postEntity = new PostEntity();
                $postEntity->hydrate($item);
                array_push($posts, $postEntity);
            }
            return $posts;        
        }
        /** Récupére la liste des posts sous forme d'un tableau */
        function allForUser($userId)
        {
            $sql="SELECT * from blogpost where user_iduser=:user";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':user', $userId, \PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $post = [];
            foreach($data as $entity){
                $postEntity = new PostEntity();
                $postEntity->hydrate($entity);
                array_push($post, $postEntity);
            }
            return $post;
        }
        /** Récupére la liste des posts sous forme d'un tableau */
        function listPostAutorise($userId)
        {
            $sql="SELECT idblogpost from blogpost where user_iduser=:user";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':user', $userId, \PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $post = [];
            foreach($data as $entity){
                $item = $entity['idblogpost'];
                array_push($post, $item);
            }
            return $post;
        }
        /** Récupére un post à partir de son ID */
        function find($idr)
        {
            $sql="SELECT * from blogpost where idblogpost=:id";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':id', $idr, \PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
            $post = new PostEntity();
            $post->hydrate($data);
            return $post;
        }
        /** Ajoute un post à la table blogpost */
        function create($entity){

                $sql = "INSERT INTO 
                            blogpost(   idblogpost, 
                                        titre, 
                                        contenu,
                                        photo_url,
                                        date_creation,
                                        user_iduser
                        ) 
                        VALUES (
                            NULL, 
                            :titre, 
                            :contenu, 
                            :photo_url, 
                            :date_creation, 
                            :user_iduser
                        )";
                $stmt=self::$connexion->prepare($sql);
                $stmt->execute(
                    [
                        ':titre' => $entity->getTitre(),
                        ':contenu' => $entity->getContenu(),
                        ':photo_url' =>  $entity->getPhotoUrl(),
                        ':date_creation' => $entity->getDate(),
                        ':user_iduser' =>  $entity->getAuteur(),
                    ]
                );
        }    
        
        /** Mettre a jour un post à la table blogpost */
        function update($entity)
        {
            $sql = "UPDATE blogpost
                SET titre = :titre, 
                contenu = :contenu, 
                photo_url = :photo_url, 
                date_creation = :date_creation, 
                user_iduser = :user_iduser
                WHERE idblogpost = :idblogpost";
            $stmt=self::$connexion->prepare($sql);
            $stmt->execute(
                [
                    ':titre' => $entity->getTitre(),
                    ':contenu' => $entity->getContenu(),
                    ':photo_url' =>  $entity->getPhoto_url(),
                    ':date_creation' => $entity->getDate(),
                    ':user_iduser' =>  $entity->getAuteur(),
                    ':idblogpost' =>  $entity->getId(),
                ]
            );
        }

}