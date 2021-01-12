<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComboOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_option', function (Blueprint $table) {
            $table->unsignedBigInteger('combo_id');
            $table->unsignedBigInteger('option_id');
            $table->boolean('active')->nullable();
            $table->boolean('enabled')->nullable();
            $table->boolean('showed')->nullable();
            $table->string('order')->nullable();
            $table->string('css_icon')->nullable();
            $table->string('css_text_color')->nullable();
            $table->string('css_bg_color')->nullable();

            $table->timestamps();

        });

        Schema::table('combo_option', function (Blueprint $table) {
            $table->foreign('combo_id')->references('id')->on('combos')
                ->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('combo_option', function (Blueprint $table) {
            Schema::dropIfExists('combo_option');
        });
    }
}
