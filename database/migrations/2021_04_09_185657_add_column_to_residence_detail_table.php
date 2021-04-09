<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToResidenceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->string('home_address',50)->nullable();
            $table->string('home_type',50)->nullable();
            $table->string('home_duration_place',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->dropColumn('home_address');
            $table->dropColumn('home_type');
            $table->dropColumn('home_duration_place');
        });
    }
}
