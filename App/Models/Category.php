<?php

namespace App\Models;

use PDO;
use App\Utils\DB;

class Category extends CoreModel
{
    public $name;
    //une propriété pour stocker les produits de la catégorie
    public $products = [];

    static public function findById(int $id) {

        $pdoDBConnexion = DB::getPdo();
        
        $sql = "SELECT * FROM `categories` WHERE id = " . $id ;
        $pdoStatement = $pdoDBConnexion->query($sql);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, self::class);

        return $pdoStatement->fetch();
    }

    static public function findAll() {

        $pdoDBConnexion = DB::getPdo();
        
        $sql = "SELECT * FROM `categories` ORDER BY `name`" ;
        $pdoStatement = $pdoDBConnexion->query($sql);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    
    /**
     * Récupérer toutes les categories avec les produits associés
     * @return [] contenenant des objets Category avec les produits associés
     */
    static public function findAllWithProducts() {

        $pdoDBConnexion = DB::getPdo();
        
        $sql = "SELECT products.*, categories.id as category_id, categories.name as category_name
        FROM `categories` 
        LEFT JOIN `products` 
        ON categories.id = products.id_category
        ORDER BY `name`" ;

        $pdoStatement = $pdoDBConnexion->query($sql);
        //je récupère les résultats sous forme de tableau associatif
        $results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        //je prépare un tableau vide pour stocker les categories
        $categories = [];

        // l'idée est de construire la colection comme fait symfony
        foreach($results as $result){
            //je vérifie si la catégorie existe déjà pour ne pas écraser les données
            //en remplaçant chaque produit instancié par le suivant
            //et bien créer le tableau $products contenant tous les produits associés à la catégorie
            if(!array_key_exists($result['category_id'], $categories)){
                $category = new Category();
                $category->id = $result['category_id'];
                $category->name = $result['category_name'];
                //je stocke chaque catégorie dans le tableau $categories
                $categories[$result['category_id']] = $category;
            }
            //je crée un objet product si le produit n'est pas null
            if(isset($result['id'])){
                $product = new Product();
                $product->id = $result['id'];
                $product->category_name = $result['category_name'];
                $product->id_editor = $result['id_editor'];
                $product->title = $result['title'];
                $product->description = $result['description'];
                $product->price = $result['price'];
                $product->date_release = $result['date_release'];
                $product->minimum_age = $result['minimum_age'];
                $product->image = $result['image'];
                //je stocke chaque produit dans le tableau $products de la catégorie
                $categories[$result['category_id']]->products[$product->id] = $product;
            }
        }
        //je retourne le tableau de catégories + produits
        return $categories;
            
    }

    public function save() {
        //todo
    }
    
}