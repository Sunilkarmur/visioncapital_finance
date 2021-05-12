<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBorMobNoToFinanceForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->string('bor_mob_no', 20)->after('bor_pan_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    }
}
