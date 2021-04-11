<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFinanceFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->string('bor_name',50)->nullable();
            $table->string('bor_amount',50)->nullable();
            $table->string('bor_time_limit',3)->nullable();
            $table->string('bor_purpose',255)->nullable();
            $table->string('bor_affiliate_vc',20)->nullable();
            $table->string('bor_affiliate_type',20)->nullable();
            $table->string('bor_affiliate_type_other',255)->nullable();
            $table->string('bor_pan_no',15)->nullable();
            $table->string('bor_aadhar_no',20)->nullable();
            $table->string('bor_pin_code',8)->nullable();
            $table->date('bor_dob')->nullable();
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
            $table->dropColumn('bor_name');
            $table->dropColumn('bor_amount');
            $table->dropColumn('bor_time_limit');
            $table->dropColumn('bor_purpose');
            $table->dropColumn('bor_affiliate_vc');
            $table->dropColumn('bor_affiliate_type');
            $table->dropColumn('bor_affiliate_type_other');
            $table->dropColumn('bor_pan_no');
            $table->dropColumn('bor_aadhar_no');
            $table->dropColumn('bor_pin_code');
            $table->dropColumn('bor_dob');
        });
    }
}
