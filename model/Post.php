<?php
namespace App\models;

class Post extends Model{

        /** Récupére la liste des posts sous forme d'un tableau */
        function all(){
            $sql="SELECT * from blogpost";
            $data=self::$connexion->query($sql);
            return $data;
        }
        /** Récupére un post à partir de son ID */
        function show($id)
        {
            $sql="SELECT * from blogpost where idblogpost=:id";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }
        /** Ajoute un post à la table blogpost */
        function create(
                $titre, 
                $contenu, 
                $photo_url, // ne peut etre nul
                $date_creation, 
                $user_iduser // doit etre un integer
            ){
                $sql = "INSERT INTO blogpost(idblogpost, titre, contenu,photo_url,date_creation,user_iduser) 
                    VALUES (NULL, :titre, :contenu, :photo_url, :date_creation, :user_iduser)";
                $stmt=self::$connexion->prepare($sql);
                $stmt->execute(
                    [
                        ':titre' => $titre,
                        ':contenu' => $contenu,
                        ':photo_url' =>  $photo_url,
                        ':date_creation' => $date_creation,
                        ':user_iduser' =>  $user_iduser,
                    ]
                );
            }    
        
        /** Mettre a jour un post à la table blogpost */
        function update($titre, $contenu, $photo_url, $date_creation, $user_iduser, $idblogpost){
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
                ':titre' => $titre,
                ':contenu' => $contenu,
                ':photo_url' =>  $photo_url,
                ':date_creation' => $date_creation,
                ':user_iduser' =>  $user_iduser,
                ':idblogpost' =>  $idblogpost,
            ]
        );
        }
}