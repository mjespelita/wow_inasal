<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
protected $fillable = [
    "status",
    "sent_to_kitchen_at",
    "done_at","users_id",
    "table_number",
    "total",
    "isTrash"
];
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function orderItems()
    {
        return $this->hasMany(Orderitems::class);
    }
}
