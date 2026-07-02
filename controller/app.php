<?php
// controller/app.php
function runApp(): void {
    $produits = getInitialProduits();
    $archive = [];

    $produits = gererCreationProduit($produits);
    gererArchive($produits, $archive);
    afficherArchiveController($archive);
}