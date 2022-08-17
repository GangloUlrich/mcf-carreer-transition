<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UserRequest;
use App\Http\Requests\ResumeRequest;
use App\Models\Ecole;
use App\Models\Filiere;
use App\Models\Info;
use App\Models\Secteur;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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


    public function displayResume($id){
        $resume =User::find($id)->info->resume;
        $path = Storage::disk('public')->path($resume);

        return response()->file($path);
    }


    public function changeResumeForm($user){
        $scholar = User::findorfail($user);
        return view('resumes.updateresume',[
            'user' => $scholar
        ]);
    }

    public function changeResume(ResumeRequest $request, $user){

        $param = $user;
        $user = User::findorfail($param);
        $datas = [
          'firstname' => $user->info->firstname,
          'lastname' => $user->info->lastname,
          'resume' => $request->resume
        ];

        $scholar = new UserService();

        $scholar->saveUserResume($datas);

        return view('resumes.displaynewresume',['user' => $user]);


    }
}
