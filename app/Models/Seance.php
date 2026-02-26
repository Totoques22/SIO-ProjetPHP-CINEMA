<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model{
    protected $table = 'seance';
    protected $primaryKey = 'idSea';
    public $timestamps= false;
    protected $fillable = [
        'dateHeurSea',
        'langSea'
    ];
    public function concerners()
    {
        return $this->hasMany(Concerner::class, 'idSea');
    }
    public function salle() {
        return $this->belongsTo(Salle::class, 'idSal', 'idSal');
    }
}
