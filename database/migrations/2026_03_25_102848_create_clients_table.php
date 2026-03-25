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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('aadhaar_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->text('address')->nullable();
            $table->integer('credit_score')->default(0);
            $table->decimal('total_borrowed', 20, 2)->default(0);
            $table->decimal('total_paid', 20, 2)->default(0);
            $table->decimal('balance', 20, 2)->default(0);
            $table->enum('status', ['active', 'inactive', 'blocklisted'])->default('active');
            $table->unsignedBigInteger('tenant_id')->nullable(); // SaaS ready
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
