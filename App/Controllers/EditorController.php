<?php
namespace App\Controllers;

use App\Models\Editor;
use App\Models\Product;
use Exception;

class EditorController extends CoreController{

    public function list()
    {

        $editors = Editor::findAll();
        $products = Product::findAll();
    
        return $this->render('editor/list', compact('editors','products'));
    }

    public function show(array $params)
    {

        $editor = Editor::findById($params['id']);
        
        if(!$editor){
            throw new Exception("L'éditeur n'existe pas !",404);
        }

        $products = Product::findByEditor($params['id']);

        return $this->render('editor/show', compact('editor','products'));
    }
    
}