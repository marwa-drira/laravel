<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function index()
    {
    $pieces = Piece::all();
    return $pieces;
    }
    public function store(Request $request)
    {
    $piece = new Piece([
    'titre' => $request->input('titre'),
    'flyer' => $request->input('flyer')
  

    ]);
    $piece->save();
    return response()->json($piece, 201);
    }
    public function show($id)
    {
    $piece = Piece::find($id);
    return response()->json($piece);
    }
    public function update(Request $request, $id)
    {
    $piece = Piece::find($id);
    $piece->update($request->all());
    return response()->json($piece, 200);
    }
    public function destroy($id)
    {
    $piece = Piece::find($id);
    $piece->delete();
    return response()->json('Piece supprimée !');
    }
    
}
