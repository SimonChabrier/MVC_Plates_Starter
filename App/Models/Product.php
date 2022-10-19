<?php

namespace App\Models;

use App\Utils\DB;

class Product extends CoreModel
{
    public $id_category;
    public $category_name;
    public $id_editor;
    public $editor_name;
    public $title;
    public $description;
    public $price;
    public $date_release;
    public $minimum_age;
    public $image;

    static public function findById(int $id)
    {
        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        WHERE products.id = " . $id;

        $pdoStatement = $pdoDBConnexion->query($sql);

        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);
        return $pdoStatement->fetch();
    }

    static public function findAll()
    {

        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        ORDER BY `title`";

        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    static public function findAllHomePage()
    {

        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        ORDER BY `date_release` DESC
        LIMIT 5";

        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    static public function findByEditor(int $id_editor) {

        $pdoDBConnexion = Db::getPdo();
        
        $sql = "SELECT * from products " ;
        $sql .= "WHERE products.id_editor = :id_editor ";
        $sql .= "ORDER BY products.title ";

        $pdoStatement = $pdoDBConnexion->prepare($sql);

        $pdoStatement->execute([
            ':id_editor' => $id_editor
        ]);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    static public function findByCategory($id_category) {

        $pdoDBConnexion = Db::getPdo();

        $sql = "SELECT * from products " ;
        $sql .= "WHERE products.id_category = :id_category ";
        $sql .= "ORDER BY products.title ";

        $pdoStatement = $pdoDBConnexion->prepare($sql);

        $pdoStatement->execute([
            ':id_category' => $id_category
        ]);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save()
    {
        //todo
    }

    public function getReleaseDate()
    {
        $date = strtotime($this->date_release);
        return date('d/m/Y', $date);
    }

    static public function search($search){

        $pdoDBConnexion = DB::getPdo();

        $sql = "SELECT 
            products.*, 
            categories.name AS category_name, 
            editors.name AS editor_name 
        FROM `products` 
        LEFT JOIN categories ON categories.id = products.id_category
        LEFT JOIN editors ON editors.id = products.id_editor
        WHERE products.title LIKE '%$search%' OR products.description LIKE '%$search%'";

        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    
}
