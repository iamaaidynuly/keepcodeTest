<?php

use App\Module\Market\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('statuses')->insert($this->data());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->data() as $item) {
            DB::table('statuses')->where($item)
                ->delete();
        }
    }

    private function data(): array
    {
        return [
            [
                'id'    => Status::ID_CREATED,
                'name'  => 'Заказ создан!'
            ],
            [
                'id'    => Status::ID_DELIVERED_BY_COURIER,
                'name'  => 'Доставляется курьером!'
            ],
            [
                'id'    => Status::ID_DELIVERED,
                'name'  => 'Доставлен!'
            ],
            [
                'id'    => Status::ID_REFUND,
                'name'  => 'Возврат!'
            ],
        ];
    }
};
