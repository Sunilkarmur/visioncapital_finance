<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToFinanceFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->float('remaing_disbursement_amount',15,2)->nullable();
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
            $table->dropColumn('remaing_disbursement_amount');
        });
    }
}
