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
            $table->float('loan_amount');
            $table->float('emi_amount');
            $table->float('bank_balance');
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
