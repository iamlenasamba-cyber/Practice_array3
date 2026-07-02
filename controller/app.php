<?php
// controller/app.php

function runApp(): void {
    $produits = getInitialProduits();

    $produits = gererCreationProduit($produits);

}
