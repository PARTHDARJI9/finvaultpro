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
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name');
            $table->decimal('invested_amount', 20, 2);
            $table->decimal('current_value', 20, 2)->nullable();
            $table->string('category'); // Fixed, Equity, Loan Pool
            $table->decimal('expected_roi', 5, 2);
            $table->enum('status', ['active', 'closed', 'liquidated'])->default('active');
            $table->date('investment_date');
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_items');
    }
};
