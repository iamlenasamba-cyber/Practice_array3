<?php
// utiles/error.php

function required(string $value, array &$errors, string $message): void {
    if (trim($value) === "") {
        $errors['required'] = $message;
    }
}

function tellnique(string $tel, array $clients, array &$errors, string $message): void {
    foreach ($clients as $client) {
        if ($client["tel"] === $tel) {
            $errors['nonUnique'] = $message;
        }
    }
}

function libelleUnique(string $libelle, array $produits, array &$errors, string $message): void {
    foreach ($produits as $p) {
        if (strtolower($p["libelle"]) === strtolower($libelle)) {
            $errors['nonUniqueLibelle'] = $message;
        }
    }
}