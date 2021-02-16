<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['seating_id', 'day_id'];

    public function getAvailableAttribute()
    {
        return max(0, ((Competitors::first()->count-1) * $this->seating->experience->tables->sum()) - $this->guests()->count());
    }

    public function seating(){
        return $this->belongsTo(Seaing::class, 'seating_id', 'id');
    }

    public function day(){
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    public function guest(){
        return $this->hasMany(Guest::class);
    }
}
