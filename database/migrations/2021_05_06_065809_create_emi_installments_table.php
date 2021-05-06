<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmiInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emi_installments', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->date('installment_date');
            $table->date('paid_date');
            $table->double('installment_amount',16,2);
            $table->double('paid_amount',16,2);
            $table->double('penalty_amount',16,2)->default(0);
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('emi_installments');
    }
}
