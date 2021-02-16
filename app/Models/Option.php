<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['seating_id', 'day_id'];

    public function day(){
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    public function seating(){
        return $this->belongsTo(Seaing::class, 'seating_id', 'id');
    }

    public function guest(){
        return $this->hasMany(Guest::class);
    }
}
