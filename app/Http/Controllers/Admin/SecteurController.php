<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secteurs = Secteur::all();

        return view('admin.secteurs.index', ['secteurs' => $secteurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = Secteur::all();

        return view('admin.secteurs.create',['secteurs' => $secteurs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),Secteur::$rules);

        if($validator->fails()){
            return redirect()->route('secteurs.create')->withErrors($validator)->withInput();
        }

        $secteur = Secteur::create($request->all());

        Session::flash('message', 'Nouveau secteur cree');

        return  redirect()->route('secteurs.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function show(Secteur $secteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Secteur $secteur)
    {
        $secteurs = Secteur::all();
        return view('admin.secteurs.edit',['secteur' => $secteur, 'secteurs' => $secteurs ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Secteur $secteur)
    {
        $validator = Validator::make($request->all(),Secteur::$rules);

        if($validator->fails()){
            return redirect()->route('secteurs.create')->withErrors($validator)->withInput();
        }

        $secteur->update($request->all());

        Session::flash('message', 'Secteur modifié');

        return  redirect()->route('secteurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secteur $secteur)
    {

        $secteur->delete();

        Session::flash('message', 'Secteur supprime');


        return redirect()->route('secteurs.index');
    }
}
