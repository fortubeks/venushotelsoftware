<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','number_of_rooms','phone','website','logo','address','country_id','state_id'];

    public function category(){
      return $this->belongsTo(RoomCategory::class);
    }

    public function purchaseCategory(){
      return $this->belongsTo(PurchaseCategory::class);
    }
}

