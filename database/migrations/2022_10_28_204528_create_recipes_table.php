<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipecategory_id')->constrained();
            $table->foreignId('unit_id')->constrained();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->unsignedMediumInteger('preptime')->nullable();
            $table->unsignedMediumInteger('cooktime')->nullable();
            $table->unsignedMediumInteger('totaltime')->nullable();
            $table->text('recipeyield')->nullable();
            $table->enum('diet', ["DiabeticDiet","GlutenFreeDiet","HalalDiet","HinduDiet","KosherDiet","LowCalorieDiet","LowFatDiet","LowLactoseDiet","LowSaltDiet","VeganDiet","VegetarianDiet"])->nullable();
            $table->string('cuisine', 100)->nullable();
            $table->decimal('price', 7, 2);
            $table->decimal('cost', 7, 2);
            $table->decimal('costpriceratio', 7, 2);
            $table->decimal('mc', 7, 2);
            $table->decimal('profit', 7, 2);
            $table->decimal('deliverycharge', 7, 2);
            $table->boolean('instock');
            $table->string('slug', 100);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
