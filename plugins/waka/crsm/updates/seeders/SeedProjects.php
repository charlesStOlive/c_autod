<?php namespace Waka\Crsm\Updates\Seeders;

use Seeder;
use Waka\Crsm\Models\TypeLot;

class SeedProjects extends Seeder
{
    public function run()
    {
        // Db::table('waka_crsm_projects')->truncate();
        // Db::table('waka_crsm_missions')->truncate();
        // Db::table('waka_crsm_project_states')->truncate();

        // echo 'Chargement du classeur CRM PROJECT MISSION' . PHP_EOL;
        // Excel::import(new \Waka\Crsm\Classes\Imports\ClasseurCrsmProjectMissionImport, plugins_path('waka/crsm/updates/excels/start_crsm_missions.xlsx'));

        \Db::table('waka_crsm_project_states')->truncate();
        $sql = plugins_path('waka/crsm/updates/sql/waka_crsm_project_states.sql');
        \DB::unprepared(file_get_contents($sql));

        TypeLot::create(['name' => 'T1', 'slug' => 't1']);
        TypeLot::create(['name' => 'T2', 'slug' => 't2']);
        TypeLot::create(['name' => 'T3', 'slug' => 't3']);
        TypeLot::create(['name' => 'T4', 'slug' => 't4']);
        TypeLot::create(['name' => 'T5', 'slug' => 't5']);
        TypeLot::create(['name' => 'T6', 'slug' => 't6']);

        // \Db::table('waka_crsm_projects')->truncate();
        // $sql = plugins_path('waka/crsm/updates/sql/waka_crsm_projects.sql');
        // \DB::unprepared(file_get_contents($sql));

        // \Db::table('waka_crsm_lots')->truncate();
        // $sql = plugins_path('waka/crsm/updates/sql/waka_crsm_lots.sql');
        // \DB::unprepared(file_get_contents($sql));

    }

}
