<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'hotel_id'];
    
    public function hotel()
    {
        return $this->hasMany(Hotel::class);
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
