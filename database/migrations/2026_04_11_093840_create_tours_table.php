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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->integer('category');
            $table->string('slug')->unique();

            $table->string('title');
            $table->string('breadcrumb_img_tour');
            $table->text('description');
            $table->text('overview');
            $table->json('itinerary')->nullable();

            $table->string('tags')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('visibility')->default(1);
            $table->boolean('is_notified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
