<?php namespace Waka\Crsm\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('waka_crsm_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('cp_id')->unsigned();
            $table->integer('project_state_id')->unsigned();
            $table->text('description')->nullable();
            $table->text('description_html')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->date('closed_at')->nullable();
            $table->date('closed_presvision_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_crsm_projects');
    }
}
