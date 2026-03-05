<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model{
    protected $table ='Reservation';
    protected $primaryKey = 'idRes';
    public $timestamps = false;
    protected $fillable=[
        'datRes'
    ];
    public function concerners()
    {
        return $this->hasMany(Concerner::class, 'idRes');
    }
}
