<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
          $table->id();
          $table->string('brand');
          $table->string('model');
          $table->year('year');
          $table->string('fuel_type');
          $table->string('Status')->default('available'); 
          $table->integer('mileage')->nullable(); 
          $table->decimal('price', 10, 2);
          $table->decimal('priceRental');
          $table->boolean('is_rental')->default(false); 
          $table->text('description')->nullable();
          $table->string('image')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
