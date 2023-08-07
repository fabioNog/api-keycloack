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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->integer('position')->nullable();
            $table->integer('level')->default(0);
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->longText('tree')->nullable()->charset('utf8mb4')->collation('utf8mb4_bin');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
