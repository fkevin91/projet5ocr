<?php

namespace App\Model;
use App\Entities\Comment as CommentEntity;


class Comment extends Model{

    function create($entity){
        $sql = "INSERT INTO comments(
                    idcomments, 
                    date, 
                    contenu, 
                    isApprouve, 
                    user_iduser, 
                    blogpost_idblogpost, 
                    autheur) 
                VALUES (
                    NULL, 
                    :date,
                    :contenu, 
                    0,
                    :user_iduser,
                    :blogpost_idblogpost,
                    :autheur)";
        $stmt=self::$connexion->prepare($sql);
        return $stmt->execute(
            [
                ':date' => date("Y-m-d H:i:s"),
                ':contenu' => strip_tags($entity->getContenu()),
                ':user_iduser' => strip_tags($entity->getUser()),
                ':blogpost_idblogpost' =>  strip_tags($entity->getBlogpost()),
                ':autheur' =>  strip_tags($entity->getAuteur()),
            ]
        );
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
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $comments = [];
        foreach($data as $entity){
            $commentEntity = new CommentEntity();
            $commentEntity->hydrate($entity);
            array_push($comments, $commentEntity);
        }
        return $comments;
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
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $comments = [];
        foreach($data as $entity){
            $commentEntity = new CommentEntity();
            $commentEntity->hydrate($entity);
            array_push($comments, $commentEntity);
        }
        return $comments;
    }
    
    function validation($idcomment){
        $sql="UPDATE `comments` SET `isApprouve` = '1' WHERE comments.idcomments = :idcomment";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':idcomment', $idcomment, \PDO::PARAM_INT);
        $stmt->execute();
    }

    function all(){
        $sql = "SELECT * FROM `comments` ORDER BY idcomments DESC";
        $data=self::$connexion->query($sql);
        return $data;
    }

    function delByIdComment($idblogpost)
    {
        $sql="DELETE FROM comments WHERE comments.blogpost_idblogpost = :idblogpost";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':idblogpost', $idblogpost, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}