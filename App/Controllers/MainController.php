<?php 

namespace App\Controllers;
use App\Models\Editor;
use App\Models\Product;
use App\Models\Category;


class MainController extends CoreController
{   

    public function home()
    {   
        $template = 'main/home';

        $products = Product::findAll();
        $categories = Category::findAll();
        $editors = Editor::findAll();
        
        return $this->render($template, compact('products','categories','editors'));
    }
}
