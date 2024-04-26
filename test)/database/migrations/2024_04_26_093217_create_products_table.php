<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body_html')->nullable();
            $table->string('vendor')->nullable();
            $table->string('product_type')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string('handle')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('template_suffix')->nullable();
            $table->string('published_scope')->nullable();
            $table->string('tags')->nullable();
            $table->string('status')->nullable();
            $table->string('admin_graphql_api_id')->nullable();
            $table->json('image')->nullable();
            $table->integer('inventory_quantity')->default(0);
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
