<?php namespace Waka\Crsm\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateLotsTableU104 extends Migration
{
    public function up()
    {
        Schema::table('waka_crsm_lots', function (Blueprint $table) {
            $table->integer('price')->nullable();
        });
    }

    public function down()
    {
        Schema::table('waka_crsm_lots', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}
