<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;

class SpectacleController extends Controller
{
    public function index()
    {
        $spectacles = Spectacle::all();
        return $spectacles;
    }
    public function store(Request $request)
    {
        $spectacle = new Spectacle([
            'datespectacle' => $request->input('datespectacle'),
            'pieceID' => $request->input('pieceID'),
            'salleID' => $request->input('salleID')

        ]);
        $spectacle->save();
        return response()->json($spectacle, 201);
    }
    public function show($id)
    {
        $spectacle = Spectacle::find($id);
        return response()->json($spectacle);
    }
    public function update(Request $request, $id)
    {
        $spectacle = Spectacle::find($id);
        $spectacle->update($request->all());
        return response()->json($spectacle, 200);
    }
    public function destroy($id)
    {
        $spectacle = Spectacle::find($id);
        $spectacle->delete();
        return response()->json('Spectacle supprimée !');
    }
}
