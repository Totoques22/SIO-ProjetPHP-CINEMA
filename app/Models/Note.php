<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model {
    protected $table      = 'note';
    protected $primaryKey = 'idNote';

    protected $fillable = ['notFil', 'idFil', 'user_id'];

    protected $casts = [
        'notFil' => 'boolean',
    ];

    public function film() {
        return $this->belongsTo(Film::class, 'idFil', 'idFil');
    }

    public function utilisateur() {
        return $this->belongsTo(User::class, 'idUti', 'id');
    }
}
