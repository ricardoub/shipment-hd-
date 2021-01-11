<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('description')->nullable();

            // foreign keys to the combo_options table
            $table->string('recordcategory_id');
            $table->string('recordsituation_id');
            $table->string('recorddisplay_id');
            $table->string('routine_id');
            $table->string('value_type_id');

            // records are stored in parameter_values table
            $table->string('value_qtde');

            $table->timestamps();

            //$table->foreign('record_category_id')->references('id')->on('posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
