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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('charity_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->string('delivery_name')->nullable();  // اسم المستلم
            $table->string('delivery_phone')->nullable(); // رقم الهاتف
            $table->string('delivery_address')->nullable(); // عنوان التسليم
            $table->boolean('user_delivered')->default(false);
            $table->boolean('site_delivered')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
