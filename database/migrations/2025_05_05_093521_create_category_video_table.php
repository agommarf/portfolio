<?php

// database/migrations/xxxx_xx_xx_create_category_video_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryVideoTable extends Migration
{
    public function up()
    {
        Schema::create('category_video', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('video_id')->constrained()->onDelete('cascade');
            $table->primary(['category_id', 'video_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_video');
    }
}
