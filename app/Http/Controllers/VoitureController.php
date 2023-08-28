<?php

namespace App\Http\Controllers;

use App\Models\voiture;
use App\Models\modele;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures=voiture::all();
        $modeles=modele::all();
        return view('voitures.index',compact('voitures','modeles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modeles=modele::all();
        return view ('voitures.create',compact('modeles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[];
        $data['id']=$request->id;
        $data['matricule']=$request->matricule;
        $data['modele_id']=$request->modele_id;
        $data['kilometrage']=$request->kilometrage;       
        voiture::insert($data);
        return redirect()->route('voitures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(voiture $voiture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(voiture $voiture)
    {
        $modeles=modele::all();
        return view('voitures.edit',compact('voiture','modeles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, voiture $voiture)
    {
        $voiture->id=$request->id;
        $voiture->matricule=$request->matricule;
        $voiture->modele_id=$request->modele_id;
        $voiture->kilometrage=$request->kilometrage;
        $voiture->save();

       return redirect()->route('voitures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('voitures.index');
    }
}
