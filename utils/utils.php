<?php
// utiles/utils.php

function saisie(string $message): string {
    return readline($message);
}

function listen(array $array): void {
    print_r($array);
}

function concatenation(int $taille): string {
    if ($taille <= 9) {
        return "REF00" . $taille;
    } elseif ($taille <= 99) {
        return "REF0" . $taille;
    } else {
        return "REF" . $taille;
    }
}

function generesReference(array $produits): string {
    $taille = count($produits) + 1;
    return concatenation($taille);
}