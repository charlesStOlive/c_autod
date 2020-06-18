<?php namespace Waka\Crsm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Lots Back-end Controller
 */
class Lots extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Waka.Utils.Behaviors.DuplicateModel',
        'Backend.Behaviors.RelationController',
        'Waka.Utils.Behaviors.PopupActions',
        'Waka.Worder.Behaviors.WordBehavior',
        'Waka.Mailer.Behaviors.MailBehavior',
        'Waka.Pdfer.Behaviors.PdfBehavior',
        'Waka.Mailtoer.Behaviors.MailtoBehavior',
        'Waka.ImportExport.Behaviors.ExcelImport',
        'Waka.ImportExport.Behaviors.ExcelExport',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $duplicateConfig = 'config_duplicate.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Waka.Crsm', 'crsm', 'side-menu-lots');
    }

    public function onFalseApi()
    {
        \Excel::import(new \Waka\Crsm\Classes\Imports\LotImport(), plugins_path('waka/crsm/updates/excels/lots.xlsx'));
        return \Redirect::refresh();
    }
    public function onLoadReorder()
    {
        $this->vars['manageId'] = post("manageId");
        $this->reorder();
        return $this->makePartial('reorder');
    }

    public function reorderExtendQuery($query)
    {
        if (isset($this->params[0])) {
            $query->where('lot_id', (int) $this->params[0]);
        } else {
            throw new \Exception('Category\'s ID must be given for reordering of Projects.');
        }
    }

    public function onCloseReorder()
    {
        $modelId = post('manageId');
        $model = \Waka\Crsm\Models\Lot::find($modelId);
        $this->initForm($model);
        $this->initRelation($model, "lots");
        return $this->relationRefresh("lots");
    }

}
