<?php

use App\Module\Market\Models\TypeSale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('type_sales')->insert($this->data());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->data() as $item) {
            DB::table('type_sales')->where($item)
                ->delete();
        }
    }

    private function data(): array
    {
        return [
            [
                'id'    => TypeSale::ID_SALE,
                'name'  => TypeSale::NAME_OF_SALE
            ],
            [
                'id'    => TypeSale::ID_RENT,
                'name'  => TypeSale::NAME_OF_RENT
            ],
        ];
    }
};
