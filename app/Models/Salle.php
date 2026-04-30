<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cinema;
use App\Models\TypeSalle;

class Salle extends Model
{
    protected $table = 'salle';
    protected $primaryKey = 'idSal';
    public $timestamps = false;

    protected $fillable = [
        'numSal',
        'nbPlace',
        'idCin',
        'idTyp'
    ];

    /**Relation avec Cinema**/
    public function cinema()
    {
        return $this->belongsTo(Cinema::class, 'idCin', 'idCin');
    }

    /**
     * Relation avec TypeSalle
     */
    public function typeSalle()
    {
        return $this->belongsTo(TypeSalle::class, 'idTyp', 'idTyp');
    }
}
