<?php
// model/produit.model.php

function creerProduit(string $libelle, string $stock, string $prix, array $produits, array &$errors): array {
    required($libelle, $errors, "Le libellé est obligatoire");
    libelleUnique($libelle, $produits, $errors, "Ce produit existe déjà");
    
    $stockInt = (int)$stock;
    $prixInt = (int)$prix;
    
    if ($stockInt <= 0) {
        $errors['stock'] = "La quantité doit être positive";
    }
    if ($prixInt <= 0) {
        $errors['prix'] = "Le prix doit être positif";
    }
    
    $ref = generesReference($produits);
    $montant = $stockInt * $prixInt;
    
    return [
        "libelle" => $libelle,
        "refPro" => $ref,
        "stock" => $stockInt,
        "prix" => $prixInt,
        "montant" => $montant
    ];
}

function enregistrerProduit(array $produit, array &$produits): void {
    $produits[] = $produit;
}

function archiverProduit(string $nomProduit, array &$produits, array &$archive): bool {
    $index = null;

    foreach ($produits as $key => $product) {
        if ($nomProduit === $product['libelle']) {
            $index = $key;
            break;
        }
    }

    if ($index === null) {
        return false;
    }

    $archive[] = $produits[$index];
    array_splice($produits, $index, 1);

    return true;
}

function archivesProduit(array &$produits, array &$archive): void {
    $sarchive = readline('Entrer le nom du produit à archiver : ');

    if (archiverProduit($sarchive, $produits, $archive)) {
        echo "Produit archivé avec succès !\n";
    } else {
        echo "Produit introuvable.\n";
    }

    $choix = strtolower(readline('voulez vous afficher : '));
    if ($choix === 'oui') {
        print_r($archive);
    }
}