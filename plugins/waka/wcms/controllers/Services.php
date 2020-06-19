<?php namespace Waka\Wcms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Services Back-end Controller
 */
class Services extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.Utils.Behaviors.DuplicateModel',
        'Waka.ImportExport.Behaviors.ExcelImport',
        'Backend.Behaviors.ReorderController',

    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $duplicateConfig = 'config_duplicate.yaml';

    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Waka.Wcms', 'wcms', 'services');
    }
}
