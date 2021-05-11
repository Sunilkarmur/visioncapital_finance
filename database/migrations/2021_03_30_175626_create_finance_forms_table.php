<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_forms', function (Blueprint $table) {
            $table->id();
            $table->string('ref_name',50)->nullable();
            $table->string('ref_firm',50)->nullable();
            $table->string('ref_contact',15)->nullable();
            $table->enum('ref_affiliate_vc',['Yes','No'])->default('No');
            $table->string('ref_affiliate_type')->default('Loan');
            $table->string('ref_affiliate_type_other',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_forms');
    }
}
