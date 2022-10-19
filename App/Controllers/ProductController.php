<?php 

namespace App\Controllers;
use App\Models\Editor;
use App\Models\Product;
use App\Models\Category;

class ProductController extends CoreController
{
    public function show(array $params)
    {   
        $template = 'product/product';
        $product = Product::findById($params['id']);
        
        return $this->render($template,  compact('product'));
    }

    public function list()
	{

		$products = Product::findAll();
		return $this->render('product/list', compact('products'));
	}
}