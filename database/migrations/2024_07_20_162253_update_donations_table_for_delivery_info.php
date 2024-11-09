<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('recipient_name')->nullable();  // اسم المستلم
            $table->string('recipient_phone')->nullable(); // رقم هاتف المستلم
            $table->string('recipient_address')->nullable(); // عنوان المستلم

            // يمكنك إزالة الأعمدة التي لا تحتاج إليها إذا كانت موجودة
             $table->dropColumn('delivery_name');
             $table->dropColumn('delivery_phone');
             $table->dropColumn('delivery_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   Schema::table('donations', function (Blueprint $table) {
        $table->dropColumn(['recipient_name', 'recipient_phone', 'recipient_address']);
        });
    }
};
