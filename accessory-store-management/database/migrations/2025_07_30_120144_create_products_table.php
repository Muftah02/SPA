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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku')->unique(); // كود المنتج
            $table->string('barcode')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->decimal('cost_price', 15, 2); // سعر الشراء
            $table->decimal('selling_price', 15, 2); // سعر البيع
            $table->integer('quantity')->default(0); // الكمية المتاحة
            $table->integer('min_quantity')->default(0); // الحد الأدنى للتنبيه
            $table->string('unit')->default('قطعة'); // وحدة القياس
            $table->json('images')->nullable(); // صور المنتج
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
