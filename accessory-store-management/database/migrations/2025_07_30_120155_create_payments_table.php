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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payable_type'); // نوع الكيان (Sale, Purchase, Expense)
            $table->unsignedBigInteger('payable_id'); // معرف الكيان
            $table->decimal('amount', 15, 2); // المبلغ
            $table->enum('type', ['دفع', 'استلام', 'مصروف']); // نوع المعاملة
            $table->enum('method', ['نقد', 'شبكة', 'تحويل', 'شيك'])->default('نقد');
            $table->string('reference_number')->nullable(); // رقم المرجع
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('payment_date');
            $table->timestamps();

            $table->index(['payable_type', 'payable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
