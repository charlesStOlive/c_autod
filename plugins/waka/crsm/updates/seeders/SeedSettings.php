<?php namespace Waka\Crsm\Updates\Seeders;

use DB;
use Excel;
use Seeder;

class SeedSettings extends Seeder
{
    public function run()
    {
        Db::table('system_settings')->truncate();
        $sql = plugins_path('waka/crsm/updates/sql/system_settings.sql');
        DB::unprepared(file_get_contents($sql));

    }

}
