<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_translations', function (Blueprint $table) {
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('vehicle_id');
            $table->unique(['vehicle_id', 'locale']);
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');

            // Actual fields you want to translate
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_translations');
    }
}
