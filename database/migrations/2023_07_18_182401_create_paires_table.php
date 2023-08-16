<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paires', function (Blueprint $table) {
            $table->id();
            $table->string('devise_1', 3);
            $table->string('devise_2', 3);
            $table->decimal('taux',12,6);
            $table->unsignedInteger('conversionNumber')->default(0);
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
        Schema::dropIfExists('paires');
    }
}
