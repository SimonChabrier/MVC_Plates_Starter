<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;

class CategoryController extends CoreController{

    public function list()
    {

        // Je récupère les catégories
        $categories_and_products = Category::findAllWithProducts();

        // J'appelle la vue
        $this->render('category/list', compact('categories_and_products'));
    }

    public function show(array $params)
    {

        $category = Category::findById($params['id']);
        // S'il n'y a pas de catégorie
        if(!$category){
            // J'envoie une erreur 404
            throw new Exception("La catégorie n'existe pas !",404);
        }
        $products = Product::findByCategory($params['id']);
    
        $this->render('category/show',compact('category','products'));
    }
}