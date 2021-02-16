<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $fillable =  ['name', 'organization', 'email', 'phone', 'country', 'is_group'];


    public function guest(){
        return $this->hasMany(Guest::class, 'reservation_id', 'id');
    }
}
