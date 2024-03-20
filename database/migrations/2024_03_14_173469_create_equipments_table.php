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
        Schema::create('equipments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('franchise_id')->constrained('franchises', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('business_operation_id')->constrained('business_operations', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('operations_manager_id')->constrained('operations_managers', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('region_id')->constrained('regions', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('point_id')->constrained('points', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('software_id')->constrained('softwares', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->float('denomination', 10)->default(0.1);
            $table->float('house_edge', 10)->default(0.0);
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('equipments');
    }
};
