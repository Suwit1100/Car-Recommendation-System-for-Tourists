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
        Schema::create('faq', function (Blueprint $table) {
            $table->id();
            $table->string('letter_by');
            $table->string('title');
            $table->string('content');
            $table->string('imgfile')->nullable();
            $table->string('toAdminType')->nullable();
            $table->string('toUserId')->nullable();
            $table->string('deleteAdmin')->default('not_delete');
            $table->string('deleteUser')->default('not_delete');
            $table->string('statusAdmin')->default('new');
            $table->string('statusUser')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq');
    }
};
