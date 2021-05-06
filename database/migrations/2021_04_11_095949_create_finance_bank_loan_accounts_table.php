<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceBankLoanAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_bank_loan_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('finance_id');
            $table->string('bank_name');
            $table->string('previous_lona_type');
            $table->string('bank_branch');
            $table->double('loan_amount',16,2);
            $table->double('emi_amount',16,2);
            $table->double('bank_balance',16,2);
            $table->string('duration')->default('1');
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
        Schema::dropIfExists('finance_bank_loan_accounts');
    }
}
