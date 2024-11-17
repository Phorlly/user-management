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
        Schema::create('permission_routes', function (Blueprint $table) {
            $table->id();
            field($table, 'route');
            field($table, 'name');
            $table->unsignedBigInteger('permission_id');

            // Add foreign key constraint for 'permission_id' to reference 'permissions' table
            related($table, 'permission_id', 'permissions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_permissions');
    }
};
