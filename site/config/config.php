<?php

return [
    'debug' => true, 
    'languages' => true, 
    'languages.detect' => true,

    'panel' => [
        'install' => true,
        'slug' => 'bisou',
        'language' => 'fr',
    ],
    
     'omz13.xmlsitemap' => [
        'disable' => false,
        'include' => ['projets', 'articles'], // Pages à inclure spécifiquement
        'exclude' => ['error'], // Pages à exclure
        'priorityByDepth' => [ // Priorité selon la profondeur
            0 => 1.0, // Page d'accueil
            1 => 0.8, // Pages principales
            2 => 0.6, // Projets et articles
            3 => 0.4, // Sous-pages plus profondes
        ],
    ],
];