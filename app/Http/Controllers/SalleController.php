<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        return $salles;
    }
    public function store(Request $request)
    {
        $salle = new Salle([
            'libelle' => $request->input('libelle'),
            'adresse' => $request->input('adresse')


        ]);
        $salle->save();
        return response()->json($salle, 201);
    }
    public function show($id)
    {
        $salle = Salle::find($id);
        return response()->json($salle);
    }
    public function update(Request $request, $id)
    {
        $salle = Salle::find($id);
        $salle->update($request->all());
        return response()->json($salle, 200);
    }
    public function destroy($id)
    {
        $salle = Salle::find($id);
        $salle->delete();
        return response()->json('Salle supprimée !');
    }
}
