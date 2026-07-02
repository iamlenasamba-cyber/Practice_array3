<?php
// model/client.model.php

function creeClient(string $client, string $addresse, string $tel, array $clients, array &$errors): array {
    required($client, $errors, "Le champ nom est obligatoire");
    required($addresse, $errors, "Le champ adresse est obligatoire");
    tellnique($tel, $clients, $errors, "Le telephone doit etre unique");
    
    return [
        "client" => $client,
        "tel" => $tel,
        "addresse" => $addresse
    ];
}

function EnregistrerClient(array $client, array &$clients): void {
    $clients[] = $client;
}

function recherche(array $clients, array $commandes): void {
    echo "\n--- Clients n'ayant jamais commandé ---\n";
    foreach ($clients as $key => $client) {
        $ok = true;
        foreach ($commandes as $commande) {
            if ($key === $commande["client"]) {
                $ok = false;
                break;
            }
        }
        if ($ok) {
            echo "Client : " . $client["client"] . "\n";
        }
    }
}