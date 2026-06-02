<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'area_id',
        'street_name',
        'building_number',
        'floor_number',
        'flat_number',
        'is_main',
    ];

    // Client relationship: An address belongs to a client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    // Area relationship: An address belongs to an area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // Order relationship: An address can be associated with many orders
    public function order()
    {
        return $this->hasMany(Order::class, 'delivering_address_id');
    }
}