<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_uses', function (Blueprint $table) {
            $table->id();
            $table->integer('finance_id');
            $table->text('remark');
            $table->enum('cibil_score_required_type', ['0', '1'])->default('0');
            $table->integer('cibil_score')->nullable();
            $table->enum('managment_review_select', ['0', '1'])->default('0');
            $table->text('management_review_text')->nullable();;
            $table->enum('visit_select', ['0', '1'])->default('0');
            $table->enum('visit_review_select', ['0', '1', '2'])->default('2');
            $table->text('visit_review_text')->nullable();;
            $table->string('attend_by', 150)->nullable();;
            $table->enum('document_select', ['0', '1'])->default('0');
            $table->enum('document_review_select', ['0', '1', '2'])->default('2');
            $table->text('document_review_text')->nullable();;
            $table->enum('client_document_select', ['0', '1'])->default('1');
            $table->json('client_documents')->nullable();
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
        Schema::dropIfExists('office_uses');
    }
}
