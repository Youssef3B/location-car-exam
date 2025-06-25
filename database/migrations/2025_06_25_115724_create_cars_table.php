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
          $table->integer('mileage')->nullable(); 
          $table->decimal('price', 10, 2);
          $table->boolean('is_rental')->default(false); 
          $table->text('description')->nullable();
          $table->string('image')->nullable();
          $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
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
