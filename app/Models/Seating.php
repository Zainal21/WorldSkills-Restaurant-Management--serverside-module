<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seating extends Model
{
    use HasFactory;
    protected $table = 'seatings';
    protected $fillable = ['time', 'experience_id'];

    public function Experience(){
        return $this->belongsTo(Experience::Class, 'experience_id' , 'id');
    }

    public function Option(){
        return $this->hasMany(Option::class, 'seating_id', 'id');
    }
   
}
