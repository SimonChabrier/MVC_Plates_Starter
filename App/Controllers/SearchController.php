<?php
namespace App\Controllers;

use App\Models\Product;

class SearchController extends CoreController 
{
    public function search()
    {
        $search = filter_input(INPUT_POST, 'searchInputValue');
        $products = Product::search($search);

        return $this->render('search/results', [
            'products' => $products,
        ]);
    }
    
}