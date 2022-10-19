<?php
// ajout du template base 
$this->layout('base', ['title' => "O-playstore"]);
?>
    Nous vous présentons les meilleurs jeux du moment.
</p>

<h2>Notre sélection de jeux</h2>
<!-- $this est l'objet $templates qui contient l'instance de Plates : new Engine() -->
<div class="row">
    <!-- on boucle sur les produits -->
    <?php foreach ($products as $product) : ?>
        <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4">
            <div class="card">
                <img src="/images/products/<?= $this->e($product->image) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $this->e($product->title) ?></h5>

                    <div class="mb-2">
                        <span class="badge bg-success"><?= $this->e($product->price) ?> €</span>
                    </div>
                    <a href="<?= $urlGenerator->generate('product_show', ['id' => $product->id]) ?>" class="btn btn-primary">Découvrir</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="row">
    <div class="col">
        <div class="home-categorie-editeur p-3">
            <h2>Les jeux par catégorie</h2>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li><a href="<?= $urlGenerator->generate('category_show', ['id' => $category->id]) ?>"><?= $this->e($category->name) ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <div class="col">
        <div class="home-categorie-editeur p-3">
            <h2>Les éditeurs de jeu</h2>
            <ul>
                <?php foreach ($editors as $editor) : ?>
                    <li><a href="<?= $urlGenerator->generate('editor_show', ['id' => $editor->id]) ?>"><?= $this->e($editor->name) ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>