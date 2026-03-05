<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model{
    protected $table = "cinema";
    protected $primaryKey = "idCin";
    public $timestamps = false;
    protected $fillable = [
        'nomCin',
        'AdrCin',
        'cpCin',
        'vilCin'
    ];
}
