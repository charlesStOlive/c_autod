<?php

namespace Waka\Crsm\Functions;

use Waka\Utils\Classes\BaseFunction;

class ProjectFunctions extends BaseFunction
{
    public $model;

    public function getDataSource()
    {
        return \Waka\Utils\Models\DataSource::where('model', 'Project')->first();
    }

    public function listFunctionAttributes()
    {
        return [
            'getLots' => [
                'name' => "Liste des lots d'un projet",
                'attributes' => [
                    'reservation_state' => [
                        'label' => "Etat des réservation",
                        'type' => "dropdown",
                        'options' => [
                            'all' => 'Tous',
                            'reserved' => 'Réservé',
                            'free' => 'Non reservé',
                        ],
                    ],
                    'width' => \Config::get('waka.cloudis::ImageOptions.width'),
                    'height' => \Config::get('waka.cloudis::ImageOptions.height'),
                    'crop' => \Config::get('waka.cloudis::ImageOptions.crop'),
                    'gravity' => \Config::get('waka.cloudis::ImageOptions.gravity'),

                ],
                'outputs' => [
                    'relations' => [
                        'lots' => ['type_lot'],
                    ],
                    'images' => [
                        'plan_1',
                    ],
                ],
            ],
            // 'missionsTemplate' => [
            //     'name' => "Liste des missions template",
            //     'attributes' => [
            //         'missions' => [
            //             'label' => "Choisissez une ou plusieurs mission",
            //             'type' => "taglist",
            //             'options' => Mission::where('is_template', true)->lists('name', 'id'),
            //         ],
            //     ],
            // ],
            // 'solutionsFiltered' => [
            //     'name' => "Liste des solutions",
            //     'attributes' => [
            //         'solutions' => [
            //             'label' => "Choisissez une ou plusieurs solutions",
            //             'type' => "taglist",
            //             'options' => Solution::lists('name', 'id'),
            //         ],
            //         'width' => [
            //             'label' => "Largeur de l'image solution",
            //             'type' => "text",
            //         ],
            //         'height' => [
            //             'label' => "hauteur de l'image solution",
            //             'type' => "text",
            //         ],
            //     ],
            // ],

            // 'allContacts' => [
            //     'name' => "Tous les contacts du projet",
            // ],
            // 'getCloudiImage' => [
            //     'name' => "Choisissez un montage",
            //     'attributes' => [
            //         'cloudiId' => [
            //             'label' => "Choisissez une image",
            //             'type' => "dropdown",
            //             'options' => $this->getCloudiList(),
            //         ],
            //         'width' => [
            //             'label' => "Largeur",
            //             'type' => "text",
            //         ],
            //         'height' => [
            //             'label' => "hauteur",
            //             'type' => "text",
            //         ],
            //     ],
            // ],
            // 'getSectorContent' => [
            //     'name' => "Prendre un bloc de contenu du secteur",
            //     'attributes' => [
            //         'codes' => [
            //             'label' => "Code du bloc à utilser",
            //             'type' => "taglist",
            //             'options' => Sector::first()->contentCodeList(),
            //         ],
            //     ],
            // ],
        ];
    }

    public function getLots($attributes)
    {
        $results = null;
        if ($attributes['reservation_state'] == 'all') {
            $results = $this->model->lots()->with('plan_1', 'type_lot')->get();
        }
        if ($attributes['reservation_state'] == 'reserved') {
            $results = $this->model->lots()->has('contact')->with('plan_1', 'type_lot')->get();
        }
        if ($attributes['reservation_state'] == 'free') {
            $results = $this->model->lots()->has('contact', '=', 0)->with('plan_1', 'type_lot')->get();
        }
        $finalResult = [];
        foreach ($results as $key => $result) {
            $finalResult[$key] = $result->toArray();
            $options = [
                'width' => $attributes['width'] ?? null,
                'height' => $attributes['height'] ?? null,
                'crop' => $attributes['crop'] ?? 'fit',
                'gravity' => $attributes['gravity'] ?? 'center',
            ];
            $finalResult[$key]['plan_1'] = [
                'path' => $result->plan_1->getUrl($options),
                'width' => $attributes['width'],
                'height' => $attributes['height'],
            ];
        }
        return $finalResult;
    }
    // public function missionsTemplate($attributes)
    // {
    //     $result = Mission::whereIn('id', $attributes['missions'])->get()->toArray();
    //     return $result;
    // }
    // public function solutionsFiltered($attributes)
    // {
    //     $results = Solution::whereIn('id', $attributes['solutions'])->with('main_image')->get();
    //     $finalResult;
    //     foreach ($results as $key => $result) {
    //         $finalResult[$key] = $result->toArray();
    //         $options = [
    //             'width' => $attributes['width'],
    //             'height' => $attributes['height'],
    //         ];
    //         $finalResult[$key]['main_image'] = [
    //             'path' => $result->main_image->getUrl($options),
    //             'width' => $attributes['width'],
    //             'height' => $attributes['height'],
    //         ];
    //     }
    //     return $finalResult;
    // }

    // public function allContacts($attributes)
    // {
    //     $result = $this->model->client->contacts->get()->toArray();
    //     $result['cp'] = $this->model->cp;
    //     $result['main'] = $this->model->contact;
    //     return $result;
    // }

    // public function getSectorContent($attributes)
    // {
    //     $contents = $this->model->client->sector->content;
    //     $result = [];
    //     foreach ($contents as $content) {
    //         if (in_array($content['code'], $attributes['codes'])) {
    //             array_push($result, $content);
    //         }
    //     }
    //     return $result;
    // }

    // public function getCloudiList()
    // {
    //     $dataSource = $this->getDataSource();
    //     return $dataSource->getImagesList();

    // }

    // public function getCloudiImage($attributes)
    // {
    //     $result = "";
    //     return $result;
    // }

}
