<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockcoutecpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockcoutecps', function (Blueprint $table) {
            $table->id();
            $table->string('corporation_id');
            $table->string('company_id');
            $table->string('branch_id');
            $table->string('doc_date');
            $table->string('doc_no');
            $table->string('seq');
            $table->string('product_id');
            $table->string('quantity');
            $table->string('flag1');
            $table->string('status_transfer');
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
        Schema::dropIfExists('stockcoutecps');
    }
}
