<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UserRequest;
use App\Models\Ecole;
use App\Models\Filiere;
use App\Models\Secteur;
use App\Providers\RouteServiceProvider;
use App\Services\UserService;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return view('accueil');
    }


    public function createUser()
    {

        $ecoles = Ecole::all();
        $secteurs = Secteur::all();


        return view('auth.register', [
            'secteurs' => $secteurs,
            'ecoles' => $ecoles
        ]);
    }


    public function selectFilieres(Request $request)
    {
        $id = $request->id;

        $ecole = Ecole::find($id);

        if ($ecole == null) {
            return response()->json(['message' => "Cette école n'a pas de filière associé"],400);
        }
        else{

            $filieres = Filiere::where('ecole_id',$id)->get();

            return response()->json($filieres,200);

        }


    }


    public function register(UserRequest $request)
    {
        $userService = new UserService();

        $userFileResume = $request->safe()->only(['resume','firstname','lastname']);

        $userFileResumeInformations = $userService->saveUserResume($userFileResume);

        $createNewUser = $request->safe()->only(['firstname', 'lastname', 'email', 'password']);

        $user = $userService->createUser($createNewUser);

        $newUserInformations = $request->safe()->except(['email', 'password', 'password_confirmation','resume']);

        $userService->saveUserInfos($newUserInformations, $userFileResumeInformations,$user);

        return redirect(RouteServiceProvider::HOME);


    }
}
