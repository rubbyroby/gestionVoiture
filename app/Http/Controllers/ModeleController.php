<?php

namespace App\Http\Controllers;

use App\Models\modele;
use App\Models\marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeles=modele::all();
        $marques=marque::all();
        return view('modeles.index',compact('modeles','marques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marques=marque::all();
        return view('modeles.create',compact('marques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[];
        $data['id']=$request->id;
        $data['marque_id']=$request->marque_id;
        $data['designation']=$request->designation;
        $data['annee_modele']=$request->annee_modele;
        modele::insert($data);
        return redirect()->route('modeles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(modele $modele)
    {
        $marques=marque::all();
        return view('modeles.edit',compact('modele','marques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, modele $modele)
    {
        $modele->id=$request->id;
        $modele->marque_id=$request->marque_id;
        $modele->designation=$request->designation;
        $modele->annee_modele=$request->annee_modele;
        $modele->save();

       return redirect()->route('modeles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(modele $modele)
    {
        $modele->delete();
        return redirect()->route('modeles.index');
    }
}
