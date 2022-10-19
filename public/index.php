<?php

//* Déclaration des routes de l'application
use App\Utils\Routes;

//routage context et matcher
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Generator\UrlGenerator;


// vendor/autoload.php
require __DIR__ . '/../vendor/autoload.php';
//database
require __DIR__ . './../App/Utils/DB.php';

//On créer un contexte de routage
//je récupère le endpoint de l'URL
$current_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//* Processus de routage
try {
    //je récupère les routes
    $routes = Routes::allRoutes();

    //je récupère le contexte de requête (méthod et endpoint)
    $context = new RequestContext();

    // On fait matcher le contexte de requête avec les routes
    $matcher = new UrlMatcher($routes, $context);

    // On récupère les paramètres de la route actuelle (méthode et controller)
    $parameters = $matcher->match($current_url);

    // sur $parameters On récupère le controller et la méthode qu'on stocke dans des variables
    $controller = $parameters['_controller'];
    $method = $parameters['_method'];
    
    // J'utilise le générateur d'url de symfony routeur pour les liens dans les vues
    $generator = new UrlGenerator($routes, $context);

    //on instancie le controller contenu dans $controller
    $controllerInstance = new $controller($generator);

    // On appelle la méthode contenue dans $method 
    // en lui passant le tableau des paramètres ici il contiendra les id {id}
    $controllerInstance->$method($parameters);

    } catch (Exception $exception) {

        http_response_code($exception->getCode());
        echo $exception->getMessage();
        exit;
    }





