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
        Schema::create('franchises', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('commercial_representative_id')->nullable()->constrained('commercial_representatives', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('code', 4);
            $table->string('name');
            $table->string('identity')->nullable();
            $table->string('addres')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->boolean('service_terms')->default(true);
            $table->string('observation')->nullable();
            $table->boolean('enabled')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchises');
    }
};
