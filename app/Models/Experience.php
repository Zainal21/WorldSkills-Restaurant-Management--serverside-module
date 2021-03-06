<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experience';
    protected $fillable = ['name', 'description', 'tables'];
    
    public function seatings(){
        return $this->hasMany(Seating::class, 'experience_id' , 'id');
    }
    public function getTablesAttribute($val)
    {
        return collect(explode(',', trim($val,'"')))->map(function ($x) {return (int) $x;});
    }

    public function setTablesAttribute($val)
    {
        $this->attributes['tables'] = $val->join(',');
    }
}
