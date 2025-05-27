<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitems extends Model
{
    /** @use HasFactory<\Database\Factories\OrderitemsFactory> */
protected $fillable = [
    "orders_id",
    "orders_users_id",
    "products_id",
    "quantity",
    "total",
    "subtotal",
    "isTrash"
];
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'orders_id');
    }

    public function orderUsers()
    {
        return $this->belongsTo(User::class, 'orders_users_id');
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'products_id');
    }
}
