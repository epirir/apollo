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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('classification_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('codigo');
            $table->string('sku')->nullable();
            $table->string('name');
            $table->decimal('maximum_quantity')->nullable();
            $table->decimal('minimum_quantity')->nullable();
            $table->boolean('active')->default(1);
            $table->string('photo')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('cascade');

            $table->foreign('classification_id')
                ->references('id')
                ->on('classifications')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
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
        Schema::dropIfExists('products');
    }
}
