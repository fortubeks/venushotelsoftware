<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    protected $appends = ['full_name'];

    use HasFactory,SoftDeletes;
    protected $fillable = ['hotel_id','first_name','last_name','other_names', 'email', 'phone','address', 'city', 'country', 'title','email'];

    // public function fullName(){
    //     return $this->title.' '.$this->first_name.' '.$this->last_name;
    // }

    public function getFullNameAttribute()
    {
        return $this->title.' '. $this->first_name . ' ' . $this->last_name;
    }
}
