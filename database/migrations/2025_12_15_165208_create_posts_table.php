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
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique(); // Para URLs amigables
        $table->text('content')->nullable();
        $table->string('type'); // 'news', 'tip', 'video'

        // Archivos multimedia
        $table->string('image_path')->nullable(); // Foto de portada
        $table->string('file_path')->nullable();  // PDF adjunto
        $table->string('video_url')->nullable();  // Link a YouTube/Vimeo
        $table->string('amazon_link')->nullable(); // Venta de libros

        $table->boolean('is_published')->default(true);
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Quién lo subió
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
