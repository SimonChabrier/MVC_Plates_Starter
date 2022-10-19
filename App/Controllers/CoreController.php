<?php 

namespace App\Controllers;

use League\Plates\Engine;

class CoreController
{   

    protected $urlGenerator;

    public function __construct($urlGenerator){
        $this->urlGenerator = $urlGenerator;
    }

    public function render(string $template, array $data = []): void
    {   
        // On extrait les données du tableau associatif
        extract($data);

        // Create new Plates instance 1: path 2: extension
        $templates = new Engine(__DIR__ . '/../../Templates', 'view.php');
        // Add $urlGenerator in data to access it in the templates
        $templates->addData(['urlGenerator' => $this->urlGenerator]);

        // Render a template
        echo $templates->render($template, $data);
    }
    
}