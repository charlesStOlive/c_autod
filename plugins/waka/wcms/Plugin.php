<?php namespace Waka\Wcms;

use Backend;
use Lang;
use System\Classes\PluginBase;

/**
 * Wcms Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = [
        'Rainlab.User',
        'Toughdeveloper.Imageresizer',
        'Waka.Utils',
        'Waka.ImportExport',
        'Waka.Cloudis',
        'Waka.Informer',
    ];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Wcms',
            'description' => 'No description provided yet....',
            'author' => 'Waka',
            'icon' => 'icon-leaf',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // \Waka\Publisher\Controllers\Documents::extend(function ($controller) {
        //     $controller->implement[] = 'Waka.Wcms.Contents.ContentListNeed';
        // });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Waka\Wcms\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'waka.wcms.user.admin' => [
                'tab' => 'Waka CMS',
                'label' => 'Administrateur de WCMS',
            ],
            'waka.wcms.user.manager' => [
                'tab' => 'Waka CMS',
                'label' => 'Manager de WCMS',
            ],
            'waka.wcms.user' => [
                'tab' => 'Waka CMS',
                'label' => 'Utilisateur de WCMS',
            ],
            'waka.wcms.reader' => [
                'tab' => 'Waka CMS',
                'label' => 'Peut lire mais pas modifier WCMS',
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'wcms' => [
                'label' => 'waka.wcms::lang.menu.wcms',
                'url' => Backend::url('waka/wcms/services'),
                'icon' => 'icon-newspaper-o',
                'permissions' => ['waka.wcms.*'],
                'order' => 2,
                'sideMenu' => [
                    'side-menu-services' => [
                        'label' => Lang::get('waka.wcms::lang.menu.services'),
                        'icon' => 'icon-crosshairs',
                        'url' => Backend::url('waka/wcms/services'),
                    ],
                ],
            ],
        ];
    }
}
