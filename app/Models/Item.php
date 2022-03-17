<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function getItemCostAttribute(){
        return $this->price - ($this->price * 0. . $this->tax);
    }
    
    public function getTaxCostAttribute(){
        return ($this->price * 0. . $this->tax);
    }

}
