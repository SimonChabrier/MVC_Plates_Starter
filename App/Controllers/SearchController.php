<?php
namespace App\Controllers;

use App\Models\Editor;
use App\Models\Product;

class SearchController extends CoreController 
{
    public function search()
    {
        $search = $_POST['searchInputValue'];
        $products = Product::search($search);
        return $this->render('search/results', [
            'products' => $products,
        ]);
    }
    
}