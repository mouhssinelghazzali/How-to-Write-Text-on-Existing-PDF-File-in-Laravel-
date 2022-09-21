<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

/*
    public function items() {
        return $this->belongsToMany(Item::class);
    }
    */
}
