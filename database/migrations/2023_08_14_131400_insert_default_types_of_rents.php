<?php

use App\Module\Market\Models\TypeRent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('type_rents')->insert($this->data());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->data() as $item) {
            DB::table('type_rents')->where($item)
                ->delete();
        }
    }

    private function data(): array
    {
        return [
            [
                'id'        => TypeRent::ID_FOUR_HOUR_PERIOD,
                'name'      => TypeRent::NAME_FOUR_HOUR_PERIOD,
                'period'    => 4,
            ],
            [
                'id'        => TypeRent::ID_EIGHT_HOUR_PERIOD,
                'name'      => TypeRent::NAME_EIGHT_HOUR_PERIOD,
                'period'    => 8,
            ],
            [
                'id'        => TypeRent::ID_TWELVE_HOUR_PERIOD,
                'name'      => TypeRent::NAME_TWELVE_HOUR_PERIOD,
                'period'    => 12,
            ],
            [
                'id'        => TypeRent::ID_DAY_PERIOD,
                'name'      => TypeRent::NAME_DAY_PERIOD,
                'period'    => 24,
            ],
        ];
    }
};
