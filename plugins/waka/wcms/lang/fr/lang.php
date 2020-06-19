<?php

return [
    'menu' => [
        'wcms' => 'CMS',
        'needs' => 'Réponse besoin',
        'services' => 'Services',
    ],
    'need' => [
        'id' => 'lorem',
        'name' => 'Nom du besoin',
        'slug' => 'slug',
        'intro' => 'Introduction',
        'catchline' => 'Accroche',
        'description' => 'Description',
        'description_html' => 'Description html',
        'content' => 'Contenu (pour site web uniquement)',
        'kpi' => 'Kpi',
        'icone' => 'Icone',
        'main_image' => 'Image principal',
        'linked_services' => 'Services liées',
    ],
    'service' => [
        'id' => 'ID',
        'name' => 'Nom du service',
        'slug' => 'slug',
        'description' => 'Description',
        'description_html' => 'Description_html',
        'main_image' => 'Image principal',
        'content' => 'Contenu (pour site web uniquement)',
        'linked_needs' => 'Besoins liés',
    ],
    'repeater' => [
        'text' => [
            'name' => "Bloc de text",
            'description' => "Un simple bloc de texte avec un titre",
            'title' => "Titre",
            'text' => "Text",
        ],
        'partial' => [
            'name' => "Un modèle partiel",
            'description' => "Un modèle partiel existant dans le thèmes",
            'partial' => "Nom du partial",
        ],
        'text_image' => [
            'name' => "2 colonnes, text + image",
            'description' => "Un bloc de texte avec une colonne image",
            'title' => "Titre",
            'text' => "Text",
            'image' => "Image",
        ],
        'text_svg' => [
            'name' => "Texte & SVG",
            'description' => "Un titre, un texte et un SVG du thème",
            'title' => "Titre",
            'text' => "Text",
            'svg' => "Adresse du SVG dans le repertoire SVG du thème",
            'disposition' => "Disposition en ligne ou colonne",
            'size_text' => 'Taille du text (w-1/2, w-1/3)',
            'size_svg' => 'Taille du Svg (w-1/2, w-2/3)',
        ],
        'vimeo' => [
            'name' => "Vidéo vimeo",
            'description' => "Une video",
            'title' => "Titre",
            'id' => "ID de la vidéo",
            'bg' => "Background",
        ],
        'cloudi_video' => [
            'name' => "Vidéo cloudi",
            'description' => "Une video hébergé sur le compte cloudi",
            'title' => "Titre",
            'id' => "URL de la vidéo",
            'bg' => "Background",
        ],
        'carousel' => [
            'name' => "Un carousel",
            'description' => "Carousel avec titre",
            'title' => "Titre",
            'text' => "Text",
            'image' => "Image",
            'prompt' => 'Modifier le carousel',
        ],
        'carousel_text' => [
            'name' => "Carousel - Texte",
            'description' => "Carousel à coté d'un bloc de texte et titre",
            'title' => "Titre",
            'text' => "Text",
            'image' => "Image",
            'carousel_left' => "Mettre le carousel à gauche",
            'prompt' => 'Modifier le carousel',
            'carousel_left' => "Carrousel à gauche",
            'hide_button' => "Cacher les boutons",
            'set_image' => "Mettre une image à la place du texte",
            'image_for_text' => "Image à la place du texte",
            'title_image' => "Texte dur l'image",
            'size_text' => 'taille du bloc text (w-1/2 w-1/4)',
            'size_carousel' => 'taille du carousel (w-1/2 w-3/4)',
        ],
        // 'carousel_image' => [
        //     'name' => "Carousel - Image ",
        //     'description' => "Carousel à coté d'une image ( comparatif )",
        //     'title' => "Titre de l'image",
        //     'title_carousel' => "Titre image carousel",
        //     'image' => "Image",
        //     'carousel_left' => "Mettre le carousel à gauche",
        //     'prompt' => 'Modifier le carousel',
        //     'hide_button' => "Cacher les boutons",
        // ],
    ],
];