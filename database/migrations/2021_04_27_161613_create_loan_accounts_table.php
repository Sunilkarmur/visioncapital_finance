<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->integer('finance_id');
            $table->enum('is_processing_fees',['0', '1'])->default('0');
            $table->string('agreement')->nullable();
            $table->string('franking')->nullable();
            $table->string('sign')->nullable();
            $table->string('notarized_agreement')->nullable();
            $table->string('disbursement')->nullable();
            $table->decimal('processing_fees', 16,2)->default(0);
            $table->enum('signature', ['borrower_sign', 'gaurantor_sign'])->nullable();
            $table->enum('notarized_status', ['0', '1'])->default('0');
            $table->enum('disbursement_status', ['0', '1'])->default('0');
            $table->decimal('disbursement_amount', 16,2)->default(0);
            $table->decimal('emi_amount', 16,2)->default(0);
            $table->decimal('first_emi_amount', 16,2)->default(0);
            $table->float('loan_pecentage', 5,2);
            $table->decimal('last_month_interest', 16,2)->nullable();
            $table->date('processing_date');
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
        Schema::dropIfExists('loan_accounts');
    }
}
