<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participe extends Model{
    protected $table = 'participe';
    public $timestamps = false;
    protected $fillable = [
        'idPer',
        'idFil',
        'idRolePer'
    ];
}
