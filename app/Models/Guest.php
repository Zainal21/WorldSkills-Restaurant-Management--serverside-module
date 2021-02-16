<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $fillable = ['name', 'country', 'option_id', 'reservation_id'];
    public function Reservation(){
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }

    public function option(){
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }
}
