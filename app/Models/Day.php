<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $table = 'days';
    protected $fillable = ['name', 'date'];

    public function options(){
        return $this->hasMany(Day::class, 'day_id', 'id');
    }
}
