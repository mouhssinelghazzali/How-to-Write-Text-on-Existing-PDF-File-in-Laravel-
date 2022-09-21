<?php

namespace App\Models;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }
    
    public function items() {
        return $this->belongsToMany(Item::class);
    }
}
