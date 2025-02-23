<?php

use App\Enums\ReceiptStatus;
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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('second_name');
            $table->string('last_name');
            $table->enum('status', ReceiptStatus::values())->default(ReceiptStatus::New->value);
            $table->text('comment')->nullable();
            $table->tinyInteger('amount')->default(1)->unsigned();
            $table->decimal('price')->default(0)->unsigned();
            $table->foreignId('product_id')->constrained('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
