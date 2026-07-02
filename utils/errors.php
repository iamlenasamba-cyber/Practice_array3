<?php
// utils/errors.php

function required(string $value, array &$errors, string $message): void {
    if (trim($value) === '') {
        $errors['required'] = $message;
    }
}


function libelleUnique(string $libelle, array $produits, array &$errors, string $message): void {
    foreach ($produits as $produit) {
        if (($produit['libelle'] ?? '') === $libelle) {
            $errors['nonUnique'] = $message;
            break;
        }
    }
}
