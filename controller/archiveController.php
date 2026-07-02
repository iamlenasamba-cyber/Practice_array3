<?php
// controller/archiveController.php

function gererArchive(array &$produits, array &$archive): void {
    $nomProduit = demanderNomProduitArchiver();
    $archiveProduit = archiverProduitController($nomProduit, $produits, $archive);

    afficherResultatArchive($archiveProduit);
    demanderAffichageArchive($archive);
}

function demanderNomProduitArchiver(): string {
    return saisie("\nEntrer le nom du produit : ");
}

function archiverProduitController(string $nomProduit, array &$produits, array &$archive): bool {
    return archiverProduit($nomProduit, $produits, $archive);
}

function afficherResultatArchive(bool $archiveProduit): void {
    if ($archiveProduit) {
        echo "Produit archivé avec succès !\n";
        return;
    }

    echo "Produit introuvable.\n";
}

function demanderAffichageArchive(array $archive): void {
    $choix = strtolower(saisie('Voulez-vous afficher l\'archive ? (oui/non) : '));
    if ($choix === 'oui') {
        print_r($archive);
    }
}

function afficherArchiveController(array $archive): void {
    if (empty($archive)) {
        echo "\nAucun produit archivé.\n";
        return;
    }

    echo "\n Archive des produits \n";
    foreach ($archive as $produit) {
        echo '- ' . $produit['libelle'] . ' (' . $produit['refPro'] . ') : ' . $produit['montant'] . "\n";
    }
}