<?php

namespace App\Module\Market\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $type_sale_id
 * @property ?int $type_rent_id
 * @property ?Carbon $deadline
 * @property ?Carbon $created_at
 * @property ?Carbon $updated_at
 */
final class Purchase extends Model
{
    use HasFactory;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $productId): void
    {
        $this->product_id = $productId;
    }

    public function getTypeSaleId(): int
    {
        return $this->type_sale_id;
    }

    public function setTypeSaleId(int $typeSaleId): void
    {
        $this->type_sale_id = $typeSaleId;
    }

    public function getTypeRentId(): int
    {
        return $this->type_rent_id;
    }

    public function setTypeRentId(?int $typeRentId): void
    {
        $this->type_rent_id = $typeRentId;
    }

    public function getDeadline(): ?Carbon
    {
        return $this->deadline;
    }

    public function setDeadline(?int $period): void
    {
        $this->deadline = Carbon::now()->addHours($period);
    }
}
