<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function item(){
        return $this->hasOne(Item::class,'id', 'item_id');
    }

    public function bill(){
        return $this->hasOne(Bill::class,'id', 'bill_id')->default(false);
    }
}
