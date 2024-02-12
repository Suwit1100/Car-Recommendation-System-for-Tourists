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
        Schema::create('faq_reply', function (Blueprint $table) {
            $table->id();
            $table->string('letter_id');
            $table->string('reply_by');
            $table->string('content');
            $table->string('imgfile')->nullable();
            $table->string('check_first')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_reply');
    }
};
