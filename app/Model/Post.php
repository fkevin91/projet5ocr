<?php
namespace App\Model;
use App\Entities\Post as PostEntity;
class Post extends Model{

        function delete($id)
        {
            $sql="DELETE FROM blogpost where idblogpost=:id";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
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

        /** Récupére un post à partir de son ID */
        function find($id)
        {
            $sql="SELECT * from blogpost where idblogpost=:id";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
            $post = new PostEntity();
            $post->hydrate($data);
            return $post;
        }
        /** Ajoute un post à la table blogpost */
        function create($entity){
                $sql = "INSERT INTO blogpost(idblogpost, titre, contenu,photo_url,date_creation,user_iduser) 
                    VALUES (NULL, :titre, :contenu, :photo_url, :date_creation, :user_iduser)";
                $stmt=self::$connexion->prepare($sql);
                $stmt->execute(
                    [
                        ':titre' => $entity->get_titre(),
                        ':contenu' => $entity->get_contenu(),
                        ':photo_url' =>  $entity->get_photo_url(),
                        ':date_creation' => $entity->get_date(),
                        ':user_iduser' =>  $entity->get_auteur(),
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
                    ':titre' => $entity->get_titre(),
                    ':contenu' => $entity->get_contenu(),
                    ':photo_url' =>  $entity->get_photo_url(),
                    ':date_creation' => $entity->get_date(),
                    ':user_iduser' =>  $entity->get_auteur(),
                    ':idblogpost' =>  $entity->get_id(),
                ]
            );
        }

        public function getInstances(array $data, string $class = ""):array
     {
          if ( $class === "" ) $class = $this->class; 
          $result = [];
          foreach ( $data as $key => $value ) {
               $result[$key] = new $class($value); 
          }
          return $result;
     }
}