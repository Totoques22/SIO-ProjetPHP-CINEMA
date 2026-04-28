<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function vote(Request $request, $idFil)
    {
        $userId = Auth::user()->id;
        $vote   = $request->input('vote'); // 1 = like, 0 = dislike

        $noteExistante = Note::where('idFil', $idFil)
            ->where('user_id', $userId)
            ->first();

        if ($noteExistante) {
            if ($noteExistante->notFil == $vote) {
                // Même bouton → annule le vote
                $noteExistante->delete();
            } else {
                // Bouton opposé → change le vote
                $noteExistante->update(['notFil' => $vote]);
            }
        } else {
            // Premier vote
            Note::create([
                'notFil'  => $vote,
                'idFil'   => $idFil,
                'user_id' => $userId,
            ]);
        }

        return redirect()->back();
    }
}
