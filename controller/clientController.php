<?php
// controller/clientController.php

function gererCreationClient(array $clients): array {
    while (true) {
        $donneesClient = demanderDonneesClient();
        $nouveauClient = construireNouveauClient($donneesClient, $clients);

        if ($nouveauClient !== null) {
            enregistrerClientController($nouveauClient, $clients);
            break;
        }
    }

    return $clients;
}

function demanderDonneesClient(): array {
    return [
        'nom' => saisie('Entrer le nom du client : '),
        'telephone' => saisie('Entrer le téléphone : '),
        'adresse' => saisie('Entrer l\'adresse du client : ')
    ];
}

function construireNouveauClient(array $donneesClient, array $clients): ?array {
    $errors = [];
    $nouveauClient = creeClient(
        $donneesClient['nom'],
        $donneesClient['adresse'],
        $donneesClient['telephone'],
        $clients,
        $errors
    );

    if (count($errors) !== 0) {
        afficherErreursClient($errors);
        return null;
    }

    return $nouveauClient;
}

function afficherErreursClient(array $errors): void {
    if (isset($errors['required'])) {
        echo '[Erreur] : ' . $errors['required'] . "\n";
    }
    if (isset($errors['nonUnique'])) {
        echo '[Erreur] : ' . $errors['nonUnique'] . "\n";
    }
}

function enregistrerClientController(array $nouveauClient, array &$clients): void {
    EnregistrerClient($nouveauClient, $clients);
    echo "Client enregistré avec succès.\n";
}