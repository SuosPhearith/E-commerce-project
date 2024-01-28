<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->float('price')->nullable(false);
            $table->text('description')->nullable(true);
            $table->string('sku')->nullable(true);
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('discount')->nullable();
            $table->string('tags');
            $table->text('image')->nullable(false);
            $table->text('additional_information');
            $table->float('average_review')->nullable(true);
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
