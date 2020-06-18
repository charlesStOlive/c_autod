<?php namespace Waka\Crsm\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class createProjectsTableU103 extends Migration
{
    public function up()
    {
        Schema::table('waka_crsm_projects', function (Blueprint $table) {
            $table->text('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('code_zip')->nullable();
            $table->integer('departement_id')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::table('waka_crsm_projects', function (Blueprint $table) {
            $table->dropColumn('adresse');
            $table->dropColumn('ville');
            $table->dropColumn('code_zip');
            $table->dropColumn('departement_id');
        });
    }
}