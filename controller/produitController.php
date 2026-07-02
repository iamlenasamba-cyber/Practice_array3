<?php
// controller/produitController.php

function gererCreationProduit(array $produits): array {
    while (true) {
        $donneesProduit = demanderDonneesProduit();
        $nouveauProduit = construireNouveauProduit($donneesProduit, $produits);

        if ($nouveauProduit !== null) {
            enregistrerProduitController($nouveauProduit, $produits);
            break;
        }
    }

    return $produits;
}

function demanderDonneesProduit(): array {
    return [
        'libelle' => saisie("\nEntrer le nom du produit : "),
        'stock' => saisie('Entrer la quantité : '),
        'prix' => saisie('Entrer le prix : ')
    ];
}

function construireNouveauProduit(array $donneesProduit, array $produits): ?array {
    $errors = [];
    $nouveauProduit = creerProduit(
        $donneesProduit['libelle'],
        $donneesProduit['stock'],
        $donneesProduit['prix'],
        $produits,
        $errors
    );

    if (count($errors) !== 0) {
        afficherErreursProduit($errors);
        return null;
    }

    return $nouveauProduit;
}

function afficherErreursProduit(array $errors): void {
    foreach ($errors as $erreur) {
        echo '[Erreur Produit] : ' . $erreur . "\n";
    }
}

function enregistrerProduitController(array $nouveauProduit, array &$produits): void {
    enregistrerProduit($nouveauProduit, $produits);
    echo "Produit enregistré avec la référence : " . $nouveauProduit['refPro'] . "\n";
}