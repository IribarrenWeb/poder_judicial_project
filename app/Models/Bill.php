<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function items(){
        return $this->belongsToMany(Item::class,'bill_item','bill_id','item_id');
    }

    public function getItemsCountAttribute(){
        return $this->items()->count();
    }
}
