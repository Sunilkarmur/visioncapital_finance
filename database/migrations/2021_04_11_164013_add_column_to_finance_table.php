<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_forms', function (Blueprint $table) {
            $table->json('guarantor_detail')->nullable();
            $table->enum('status',['0','1','2'])->default('0')->comment('0=draft,1=active,2=reject');
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
            $table->dropColumn('guarantor_detail');
            $table->dropColumn('status');
        });
    }
}
