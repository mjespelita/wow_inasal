<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderstatuslogs extends Model
{
    /** @use HasFactory<\Database\Factories\OrderstatuslogsFactory> */
protected $fillable = ["orders_id","orders_users_id","users_id","status","isTrash"];
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'orders_id');
    }

    public function orderUsers()
    {
        return $this->belongsTo(User::class, 'orders_users_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
