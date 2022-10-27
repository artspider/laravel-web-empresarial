<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('category_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->decimal('price', 7, 2);
            $table->decimal('stock', 7, 2);
            $table->string('slug');
            $table->string('presentation');
            $table->string('brand');
            $table->string('url_photo');
            $table->decimal('content', 7, 2);
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
        Schema::dropIfExists('products');
    }
}
