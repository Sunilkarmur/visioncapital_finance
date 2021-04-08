<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDetailTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('finance_id');
            $table->string('business_name',100);
            $table->string('business_started_date',100);
            $table->string('business_type',100);
            $table->string('promoter_name',100);
            $table->string('business_nature',100);
            $table->integer('business_monthly_income');
            $table->integer('total_no_machines');
            $table->integer('total_no_employees');
            $table->integer('monthly_turnover');
            $table->string('business_location',255);
            $table->string('business_location_type',255);
            $table->string('business_duration_place',255);

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
        Schema::dropIfExists('business_detail');
    }
}
