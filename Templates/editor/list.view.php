<?php
// ajout du template base 
$this->layout('base', ['title' => "Nos jeux par éditeurs"]);
?>
<!-- $this est l'objet $templates qui contient l'instance de Plates : new Engine() -->
<?php 
foreach ($editors as $editor) :
?>
    <h2 class="mt-5"><?= $this->e($editor->name) ?></h2>

    <div class="row">
        <?php
        $gameInEditor = false;
        foreach ($products as $product) :
            if ($product->id_editor === $editor->id) :
                $gameInEditor = true;
        ?>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4">
                    <div class="card">
                        <img src="images/products/<?= $this->e($product->image) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $this->e($product->title) ?></h5>

                            <div class="mb-2">
                                <span class="badge bg-success"><?= $this->e($product->price) ?></span>
                            </div>

                            <a href="<?= $urlGenerator->generate('product_show', ['id' => $product->id]) ?>" class="btn btn-primary">Découvrir</a>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endforeach;
        if(!$gameInEditor):
            ?>
            <p>Aucun jeu dans cette catégorie !</p>
            <?php
        endif
            ?>

    </div>
<?php endforeach ?>