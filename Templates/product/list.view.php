<?php
// ajout du template base 
$this->layout('base', ['title' => "Liste des jeux"]);
?>
<!-- $this est l'objet $templates qui contient l'instance de Plates : new Engine() -->
<div class="row">
<?php
foreach($products as $product):
?>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4">
        <div class="card">
            <img src="images/products/<?= $this->e($product->image)?>" class="card-img-top" alt="...">
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