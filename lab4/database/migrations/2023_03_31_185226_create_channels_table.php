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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->string('author', 50);
            $table->string('topic', 100);

            $table->BigInteger('news_id')
                ->unsigned()
                ->nullable(false);

            $table->timestamps();

            $table->foreign('news_id')
                ->references ('id')
                ->on('news');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
