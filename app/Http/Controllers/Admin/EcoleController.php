<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecoles = Ecole::all();
        return view('admin.ecoles.index',['ecoles' => $ecoles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ecoles = Ecole::all();
        return view('admin.ecoles.create',['ecoles' => $ecoles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),Ecole::$rules);

        if($validator->fails()){
            return  redirect()->route('ecoles.create')->withErrors($validator)->withInput();
        }

        $ecole = Ecole::create($request->all());

        Session::flash('message', 'Ecole créé avec success');

        return redirect()->route('ecoles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function show(Ecole $ecole)
    {
//        Liste des filières associées
        $filieres = Ecole::find($ecole->id)->filieres;

        return view('admin.ecoles.show',[
            'ecole' => $ecole,
            'filieres' => $filieres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function edit(Ecole $ecole)
    {
        $ecoles = Ecole::all();

        return view('admin.ecoles.edit',['ecole'=>$ecole,'ecoles' => $ecoles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ecole $ecole)
    {
        $validator = Validator::make($request->all(),Ecole::$rules);

        if($validator->fails()){
            return  redirect()->route('ecoles.create')->withErrors($validator)->withInput();
        }

        $ecole->update($request->all());

        Session::flash('message', 'Ecole modifiée avec success');

        return redirect()->route('ecoles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ecole $ecole)
    {
        $ecole->delete();

        Session::flash('message', 'Ecole supprimée avec success');

        return redirect()->route('ecoles.index');
    }
}
