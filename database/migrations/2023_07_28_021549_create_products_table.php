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
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->char('sku', 14)->unique();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->text('intellibrand_description')->nullable();
            $table->string('intellibrand_title', 100)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('image')->nullable();
            $table->text('images')->nullable();
            $table->char('omnik_id', 20)->nullable();
            $table->integer('code')->nullable();
            $table->string('label', 20)->nullable();
            $table->string('seqfornecedor', 45)->nullable();
            $table->char('ddv_exception', 1)->nullable();
            $table->string('lett_payload', 45)->nullable();
            $table->string('lett_title', 100)->nullable();
            $table->longText('lett_description')->nullable();
            $table->string('package_type', 25)->nullable();
            $table->string('package_volume', 15)->nullable();
            
            // Definição de chaves estrangeiras
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
