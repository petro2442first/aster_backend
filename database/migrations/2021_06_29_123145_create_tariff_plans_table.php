<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('profit')->nullable();
            $table->string('min_invest')->nullable();
            $table->string('max_invest')->nullable();
            $table->integer('deposit_term')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_zh')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_de')->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_plans');
    }
}
