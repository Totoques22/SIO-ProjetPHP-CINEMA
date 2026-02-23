<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model{
    protected $table = 'film';
    protected $primaryKey = 'idFil';
    public $timestamps = false;
    protected $fillable = [
        'titreFil',
        'descFil',
        'imgFil',
        'dureFil',
        'idGenre'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'idGenre', 'idGenre');
    }
}
