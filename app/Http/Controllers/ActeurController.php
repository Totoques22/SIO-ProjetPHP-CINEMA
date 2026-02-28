<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ActeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acteurs = Personne::all();
        return view('pages.gestion-acteur', compact('acteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ajout-acteur');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomPer' => 'required|string|max:255',
            'prenomPer' => 'required|string|max:255',
            'bioPer' => 'nullable|string',
            'dateNaisPer' => 'required|date',
            'lieuNaisPer' => 'required|string|max:255',
        ]);

        $dateNaissance = \Carbon\Carbon::parse($validated['dateNaisPer']);
        $ageCalcule = $dateNaissance->age;

        $acteur = new Personne();
        $acteur->nomPer = $validated['nomPer'];
        $acteur->prenomPer = $validated['prenomPer'];
        $acteur->bioPer = $validated['bioPer'];
        $acteur->dateNaisPer = $validated['dateNaisPer'];
        $acteur->lieuNaisPer = $validated['lieuNaisPer'];

        $acteur->agePer = $ageCalcule;

        $acteur->save();
        return redirect()
            ->route('acteur.admin.gestion')
            ->with('success', 'Acteur ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $acteurs = Personne::find($id);
        return view('pages.edit-acteur', compact('acteurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $personne = Personne::find($id);

        $validated = $request->validate([
            'nomPer' => 'required|string|max:255',
            'prenomPer' => 'required|string|max:255',
            'bioPer' => 'nullable|string',
            'dateNaisPer' => 'required|date',
            'lieuNaisPer' => 'required|string|max:255',
        ]);

        $dateNaissance = \Carbon\Carbon::parse($validated['dateNaisPer']);
        $ageCalcule = $dateNaissance->age;

        $personne->nomPer = $validated['nomPer'];
        $personne->prenomPer = $validated['prenomPer'];
        $personne->bioPer = $validated['bioPer'];
        $personne->dateNaisPer = $validated['dateNaisPer'];
        $personne->lieuNaisPer = $validated['lieuNaisPer'];
        $personne->agePer = $ageCalcule;

        $personne->save();

        return redirect()
            ->route('acteur.admin.gestion')
            ->with('success', 'Acteur mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $acteurs = \App\Models\Personne::find($id);
        $acteurs->delete();

        return redirect ()-> route('acteur.admin.gestion')->with('success', 'Acteur supprimé');
    }

    public function GestionActeur (Request $request){
        $acteurs = Personne::all();
        return view('pages.gestion-acteur', compact('acteurs'));

    }
}
