<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->unsignedMediumInteger('servtime');
            $table->unsignedMediumInteger('yield')->nullable()->default(1);
            $table->string('cuisine', 100)->nullable();
            $table->decimal('price', 7, 2);
            $table->decimal('cost', 7, 2);
            $table->decimal('costpriceratio', 7, 2);
            $table->decimal('mc', 7, 2);
            $table->decimal('profit', 7, 2);
            $table->decimal('deliverycharge', 7, 2);
            $table->boolean('instock');
            $table->unsignedSmallInteger('rating')->nullable();
            $table->string('slug', 100)->nullable();
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
        Schema::dropIfExists('dishes');
    }
}
