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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('subtotal', 15, 2); // المجموع الفرعي
            $table->decimal('discount', 15, 2)->default(0); // الخصم
            $table->decimal('tax', 15, 2)->default(0); // الضريبة
            $table->decimal('total', 15, 2); // الإجمالي
            $table->decimal('paid', 15, 2)->default(0); // المدفوع
            $table->decimal('remaining', 15, 2)->default(0); // المتبقي
            $table->enum('payment_method', ['نقد', 'شبكة', 'آجل', 'مختلط'])->default('نقد');
            $table->enum('status', ['مكتملة', 'معلقة', 'ملغية'])->default('مكتملة');
            $table->text('notes')->nullable();
            $table->timestamp('purchase_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
