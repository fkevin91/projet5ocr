<?php

namespace App\Model;

class Comment extends Model{

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
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
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
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    function delByIdComment($idComment)
    {
        $sql="DELETE FROM comments WHERE comments.idcomments = :idComment";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':idComment', $idComment, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


}