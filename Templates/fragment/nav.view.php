<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $urlGenerator->generate('main_home') ?>">oPlaystore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $urlGenerator->generate('product_list') ?>">Tous nos jeux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $urlGenerator->generate('category_list') ?>">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $urlGenerator->generate('editor_list') ?>">Editeurs</a>
                </li>
            </ul>
        </div>
    </div>
    <form class="d-flex" action="/search" method="POST">
        <input class="form-control me-2 ml-2" name="searchInputValue" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Chercher</button>
      </form>
</nav>
</div>