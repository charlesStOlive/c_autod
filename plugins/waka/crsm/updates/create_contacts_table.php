<?php namespace Waka\Crsm\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('waka_crsm_contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('tel_2')->nullable();
            $table->string('key')->nullable();
            //
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('waka_crsm_contacts');
    }
}
