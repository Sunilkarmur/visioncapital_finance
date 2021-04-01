<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFinanceTypeToFinanceFormTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->enum('finance_type',['cash','bank'])->default('cash');
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
            $table->dropColumn('finance_type');
        });
    }
}
