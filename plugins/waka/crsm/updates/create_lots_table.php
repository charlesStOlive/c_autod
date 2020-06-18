<?php namespace Waka\Crsm\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateLotsTable extends Migration
{
    public function up()
    {
        Schema::create('waka_crsm_lots', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('description_html')->nullable();
            $table->integer('surface')->nullable();
            $table->integer('type_lot_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->string('level')->nullable();
            $table->integer('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_crsm_lots');
    }
}
