<?php

namespace App\Model;

class Comment extends Model{

    function create($entity){
        $sql = "INSERT INTO `comments`(`idcomments`, `date`, `contenu`, `isApprouve`, `user_iduser`, `blogpost_idblogpost`, `autheur`) 
        VALUES (NULL,:date,:contenu,:isApprouve,:user_iduser,:blogpost_idblogpost,:autheur)";
        $stmt=self::$connexion->prepare($sql);
        $stmt->execute(
            [
                ':date' => $entity->get_date(),
                ':contenu' => $entity->get_contenu(),
                ':isApprouve' =>  $entity->get_isApprouve(),
                ':user_iduser' => $entity->get_user(),
                ':blogpost_idblogpost' =>  $entity->get_blogpost(),
                ':autheur' =>  $entity->get_auteur(),
            ]
        );
    }

    function all(){
        $sql = "SELECT * FROM `comments` ORDER BY idcomments DESC";
        $data=self::$connexion->query($sql);
        return $data;
    }
    
    function allByBlogPostIsApprouve($blogpost)
    {
        $sql="SELECT        * 
                FROM        comments 
                WHERE       blogpost_idblogpost = :blogpost
                AND         isApprouve = 1  
                ORDER BY    idcomments DESC";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':blogpost', $blogpost, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function allByBlogPostIsNotApprouve($blogpost)
    {
        $sql="SELECT        * 
                FROM        comments 
                WHERE       blogpost_idblogpost = :blogpost
                AND         isApprouve = 0  
                ORDER BY    idcomments DESC";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':blogpost', $blogpost, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function delByIdComment($idComment)
    {
        $sql="DELETE FROM comments WHERE comments.idcomments = :idComment";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':idComment', $idComment, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}