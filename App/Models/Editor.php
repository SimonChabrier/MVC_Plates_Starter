<?php

namespace App\Models;

use App\Utils\DB;

class Editor extends CoreModel
{
    public $name;
    public $presentation;

    static public function findById(int $id) {

        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT * FROM `editors` WHERE id = " . $id ;
        $pdoStatement = $pdoDBConnexion->query($sql);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);

        return $pdoStatement->fetch();
    }

    static public function findAll() {

        $pdoDBConnexion = DB::getPdo();
        
        $sql = "SELECT * FROM `editors` ORDER BY `name`" ;
        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save() {
        //todo
    }
}