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
        Schema::create('notify', function (Blueprint $table) {
            $table->id();
            $table->string('type_notify');
            $table->string('web_id')->nullable();
            $table->string('faq_id')->nullable();
            $table->string('text_detail');
            $table->string('user_send_id');
            $table->string('to_user_id')->nullable();
            $table->string('to_admin_type')->nullable();
            $table->string('to_user_id_read')->nullable();
            $table->string('to_admin_type_read')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notify');
    }
};
