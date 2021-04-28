<?php

class Accueil extends Model{

    /** Récupére les info de l'accueil à partir de son ID */
    function get_home_by_id($id)
    {
        $sql="SELECT * from infaccueil where idinfAccueil=:id";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}