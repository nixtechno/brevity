<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->unique();
            $table->string('slug')->unique();
            $table->string('template');
            $table->string('title');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('hero_badge')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_media_path')->nullable();
            $table->string('hero_media_type')->default('image');
            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_link')->nullable();
            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_link')->nullable();
            $table->json('content')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
