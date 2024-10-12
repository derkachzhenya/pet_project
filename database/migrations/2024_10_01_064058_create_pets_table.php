<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->decimal('price');
            $table->integer('age')->default(0);
            $table->string('main_image')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();
            

            $table->boolean('sterilization')->default(0);
            $table->boolean('vaccination')->default(0);
            $table->boolean('chip')->default(0);
            $table->boolean('processing')->default(0);

            $table->boolean('vet_pasport')->default(0);
            $table->boolean('pedigree')->default(0);
            $table->boolean('fci')->default(0);
            $table->boolean('metrics')->default(0);
            $table->string('hiking')->default('Не задано');
            $table->string('gender')->default('Не задано');

            $table->text('description')->default('No description'); // Provide default value
            $table->timestamps();

            $table->unsignedBigInteger('category_id')->nullable();

            $table->index('category_id', 'pet_category_idx');
            $table->foreign('category_id', 'pet_category_fk')->on('categories')->references('id');

            $table->unsignedBigInteger('categorylocal_id')->nullable();

            $table->index('categorylocal_id', 'pet_categorylocal_idx');
            $table->foreign('categorylocal_id', 'pet_categorylocal_fk')->on('categorylocals')->references('id');

            $table->unsignedBigInteger('categoryvariety_id')->nullable();

            $table->index('categoryvariety_id', 'pet_categoryvariety_idx');
            $table->foreign('categoryvariety_id', 'pet_categoryvariety_fk')->on('categoryvarieties')->references('id');

            $table->unsignedBigInteger('categorycolor_id')->nullable();

            $table->index('categorycolor_id', 'pet_categorycolor_idx');
            $table->foreign('categorycolor_id', 'pet_categorycolor_fk')->on('categorycolors')->references('id');

            $table->unsignedBigInteger('categoryage_id')->nullable();

            $table->index('categoryage_id', 'pet_categoryage_idx');
            $table->foreign('categoryage_id', 'pet_categoryage_fk')->on('categoryages')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
