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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('loan_number')->unique();
            $table->decimal('principal_amount', 20, 2);
            $table->decimal('interest_rate', 5, 2);
            $table->enum('interest_type', ['flat', 'reducing'])->default('flat');
            $table->integer('tenure_months');
            $table->decimal('total_payable', 20, 2);
            $table->decimal('monthly_emi', 20, 2);
            $table->enum('status', ['pending', 'active', 'completed', 'defaulted', 'rejected'])->default('pending');
            $table->date('disbursement_date')->nullable();
            $table->date('next_due_date')->nullable();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
