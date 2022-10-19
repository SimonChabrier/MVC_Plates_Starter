<?php

namespace App\Utils;

//routage Route et RouteCollection
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

//controllers
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\EditorController;
use App\Controllers\SearchController;

// en ajoutant abstract alors cette classe ne peut pas être instanciée à l'extérieur
abstract class Routes
{

    public static function allRoutes()
    {
        //On créer une collection de routes vides 
        $routes = new RouteCollection();

        // ?HOME
        // Je crée une route avec son url et son controlleur
        $route = new Route('/', [
            '_controller' => MainController::class,
            '_method' => 'home'
        ]);

        // Je rajoute la route dans ma collection de routes
        $routes->add('main_home', $route);

        // ?PRODUCTS
        $route = new Route('/produits', [
            '_controller' => ProductController::class,
            '_method' => 'list'
        ]);

        $routes->add('product_list', $route);

        $route = new Route('/produit/{id}', [
            '_controller' => ProductController::class,
            '_method' => 'show'
        ]);

        $routes->add('product_show', $route);

        // ?CATEGORY
        $route = new Route('/categories', [
            '_controller' => CategoryController::class,
            '_method' => 'list'
        ]);

        $routes->add('category_list', $route);

        $route = new Route('/categorie/{id}', [
            '_controller' => CategoryController::class,
            '_method' => 'show'
        ]);

        $routes->add('category_show', $route);

        // ?Editor
        $route = new Route('/editeurs', [
            '_controller' => EditorController::class,
            '_method' => 'list'
        ]);

        $routes->add('editor_list', $route);

        $route = new Route('/editeur/{id}', [
            '_controller' => EditorController::class,
            '_method' => 'show'
        ]);

        $routes->add('editor_show', $route);

        $route = new Route('/search', [
            '_controller' => SearchController::class,
            '_method' => 'search',
            
        ]);
   
        $routes->add('search_search', $route);

        return $routes;
    }
}
