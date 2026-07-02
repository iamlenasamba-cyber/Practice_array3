<?php
// controller/data.php

function getInitialProduits(): array {
    return [
        [
            'libelle' => 'riz',
            'refPro' => 'REF001',
            'stock' => 20,
            'prix' => 600,
            'montant' => 12000,
        ],
        [
            'libelle' => 'vermicelle',
            'refPro' => 'REF002',
            'stock' => 8,
            'prix' => 1000,
            'montant' => 8000,
        ],
    ];
}

function getInitialClients(): array {
    return [
        [
            'client' => 'lena',
            'tel' => '771163710',
            'addresse' => 'Ouest-foire',
        ],
        [
            'client' => 'dieyna',
            'tel' => '781236666',
            'addresse' => 'Fann',
        ],
    ];
}

function getInitialCommandes(): array {
    return [
        [
            'client' => 0,
            'date' => '12-05-2026',
            'montant' => 12000,
            'etat' => 'payé',
        ],
        [
            'client' => 1,
            'date' => '04-02-2026',
            'montant' => 3000,
            'etat' => 'non-payé',
        ],
    ];
}