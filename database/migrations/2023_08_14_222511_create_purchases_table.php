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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->comment('ID пользователя')
                ->constrained('users');
            $table->foreignId('product_id')
                ->comment('ID продукта')
                ->constrained('products');
            $table->foreignId('type_sale_id')
                ->comment('ID типа покупки (аренда, продажа)')
                ->constrained('type_sales');
            $table->foreignId('type_rent_id')
                ->nullable()
                ->comment('ID типа аренды(если тип покупки аренда)')
                ->constrained('type_rents');
            $table->dateTime('deadline')
                ->nullable()
                ->comment('null если покупка');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
