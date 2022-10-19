<?php
// ajout du template base 
$this->layout('base', ['title' => $this->escape($product->title)]);
?>
<!-- $this est l'objet $templates qui contient l'instance de Plates : new Engine() -->
<div class="row mt-5 mb-5">
  <div class="col">
    <img src="/images/products/<?= $this->e($product->image) ?>">
  </div>
  <div class="col">
    <strong>Caractéristiques</strong>
    <table class="table table-stripped">
      <tr>
        <td>Catégorie</td>
        <td><?= $this->e($product->category_name) ?></td>
      </tr>
      <tr>
        <td>Editeur</td>
        <td><?= $this->e($product->editor_name) ?></td>
      </tr>
      <tr>
        <td>Date de parution</td>
        <td><?= $this->e($product->getReleaseDate()) ?></td>
      </tr>
      <tr>
        <td>Age minimum</td>
        <td><?= $this->e($product->minimum_age) ?></td>
      </tr>
    </table>
  </div>
</div>

<p>
  <?= $this->e($product->description) ?>
</p>

<button type="button" class="btn btn-success">Ajouter au panier <?= $this->e($product->price) ?>€</button>