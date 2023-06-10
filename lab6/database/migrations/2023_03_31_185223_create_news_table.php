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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('text', 100);
            $table->string('date', 20);
            $table->string('count_view', 50);

            $table->BigInteger('comments_id')
                ->unsigned()
                ->nullable(false);

            $table->timestamps();

            $table->foreign('comments_id')
                ->references ('id')
                ->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
