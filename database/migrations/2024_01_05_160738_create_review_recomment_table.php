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
        Schema::create('review_recomment', function (Blueprint $table) {
            $table->id();
            $table->integer('review_by');
            $table->text('answer1');
            $table->text('answer2');
            $table->text('answer3');
            $table->text('answer4');
            $table->text('answer5');
            $table->text('answer6');
            $table->text('answer7');
            $table->text('answer8');
            $table->text('answer9');
            $table->text('answer10');
            $table->text('answer11');
            $table->text('answer12');
            $table->text('answer13');
            $table->text('answer14');
            $table->text('answer15');
            $table->text('answer16');
            $table->text('answer17');
            $table->text('answer18');
            $table->text('result');
            $table->text('score');
            $table->text('comment')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_recomment');
    }
};
