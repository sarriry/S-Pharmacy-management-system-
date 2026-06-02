<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'quantity',
        'price',
        'expiration_date',
        
    ];
public function orders()
{
    return $this->belongsToMany(
        Order::class,
        'orders_medicines',
        'medicine_id',
        'order_id'
    )->withPivot('quantity');
}
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'expiration_date' => 'date',
    ];
}


