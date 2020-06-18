<?php namespace Waka\Crsm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Projects Back-end Controller
 */
class Projects extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
        'Backend.Behaviors.ReorderController',
        'Waka.Utils.Behaviors.SidebarInfoBehavior',
        'Waka.Utils.Behaviors.PopupActions',
        'Waka.Worder.Behaviors.WordBehavior',
        'Waka.Mailer.Behaviors.MailBehavior',
        'Waka.Pdfer.Behaviors.PdfBehavior',
        'Waka.Mailtoer.Behaviors.MailtoBehavior',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $sidebarInfoConfig = 'config_sidebar_info.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Waka.Crsm', 'crsm', 'side-menu-projects');
    }

    public function update($id)
    {
        $this->bodyClass = 'compact-container';
        return $this->asExtension('FormController')->update($id);
    }
    public function relationExtendRefreshResults($field)
    {
        //trace_log("refesh");
        // Make sure the field is the expected one
        // if ($field != 'myField')
        //     return;

        return ['#sidebar_info' => $this->makePartial('sidebar_info')];
    }
    /**
     * DEBUT REORDER
     * Partie pour le reorder. Non transformé en behavior à cause de reorderExtendQuery
     * Il faut ajouter :
     *  un bouton _relation_button_reorder
     *  le config reorder : public $relationConfig = 'config_relation.yaml';
     *  le behavior 'Backend.Behaviors.RelationController'
     *
     */

    public function onLoadReorder()
    {
        $this->vars['manageId'] = post("manageId");
        $this->reorder();
        return $this->makePartial('reorder');
    }

    public function reorderExtendQuery($query)
    {
        if (isset($this->params[0])) {
            $query->where('project_id', (int) $this->params[0]);
        } else {
            throw new \Exception('Category\'s ID must be given for reordering of Projects.');
        }
    }

    public function onCloseReorder()
    {
        $modelId = post('manageId');
        $model = \Waka\Crsm\Models\Project::find($modelId);
        $this->initForm($model);
        $this->initRelation($model, "lots");
        return $this->relationRefresh("lots");
    }

    /**
     * FIN REORDER
     */
}
