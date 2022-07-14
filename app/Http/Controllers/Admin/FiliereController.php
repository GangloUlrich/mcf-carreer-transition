<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ecole;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ecole)
    {

        $ecole = (int) $ecole;

        $filieres = Ecole::find($ecole)->filieres;

        return  view('admin.filieres.create',['filieres' => $filieres, 'ecole' => $ecole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$ecole)
    {
        $filieres = Ecole::find($ecole)->filieres;


        $validator = Validator::make($request->all(),Filiere::$rules);

        if($validator->fails()){
            return  redirect()->route('ecoles.filieres.create',['ecole' => $ecole, 'filieres' => $filieres])->withErrors($validator)->withInput();
        }

        $filiere = Filiere::create(
            array_merge(
                $request->all(),
                ['ecole_id' => $ecole]
            )
            );

        Session::flash('message', 'Filiere créé avec success');

        return redirect()->route('ecoles.filieres.create',['ecole'=>$ecole,'filieres'=>$filieres]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere,$ecole)
    {
        $filieres = Filiere::all();

        return  view('admin.filieres.edit',['filieres' => $filieres, 'ecole' => $ecole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere, $ecole)
    {
        $validator = Validator::make($request->all(),Filiere::$rules);

        if($validator->fails()){
            return  redirect()->route('filieres.edit',['filiere' => $filiere , 'ecole'=>$ecole])->withErrors($validator)->withInput();
        }

        $filiere->update($request->all());

        Session::flash('message', 'Filiere créé avec success');

        return redirect()->route('filieres.edit',['filiere' => $filiere , 'ecole'=>$ecole]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiere $filiere,$ecole)
    {
        $filiere->delete();

        return redirect()->route('ecoles.show',['ecole'=>$ecole]);
    }
}
