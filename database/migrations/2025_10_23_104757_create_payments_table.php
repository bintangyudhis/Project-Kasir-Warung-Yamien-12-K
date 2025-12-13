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
            $table->integer('amount');
            $table->enum('payment_method', ['midtrans', 'cash'])->default('cash');
            $table->enum('status', ['paid', 'unpaid']);
            $table->string('transaction_id')->unique();
            $table->string('midtrans_transaction')->nullable();
            $table->date('payment_date');
            $table->timestamps();

            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
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
