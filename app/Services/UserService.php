<?php

namespace App\Services;

use App\Models\Info;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService
{

    public function saveUserResume($datas)
    {

        $resume = $datas["resume"];
        $firstname = $datas["firstname"];
        $lastname = $datas["lastname"];

        $firstname = Str::slug($firstname, '_');
        $lastname = Str::slug($lastname, '_');
        $resume_name = "cv_" . $firstname . '_' . $lastname . "." . $resume->getClientOriginalExtension();

        $resume_path = Storage::putFileAs('public', $resume, $resume_name);

        return [
            'name' => $resume_name,
            'path' => $resume_path
        ];

    }


    public function createUser($datas)
    {
        $username = $datas['firstname'] . " " . $datas['lastname'];
        $email = $datas['email'];
        $password = $datas['password'];

        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return $user;

    }

    public function saveUserInfos($datas, $resume, $user)
    {

        $info = Info::create([
            'firstname' => $datas["lastname"],
            'lastname' => $datas["firstname"],
            'resume' => $resume["path"],
            'birthday' => $datas['birthdate'],
            'sexe' => $datas['sexe'],
            'cohorte' => $datas['cohorte'],
            'phone' => $datas['phone'],
            'secteur_id' => $datas['secteur'],
            'filiere_id' => $datas['filiere'],
            'ecole_id' => $datas['ecole'],
            'user_id' => $user->id
        ]);

        event(new Registered($user));

        Auth::login($user);



    }

    public function saveUserProfilePicture()
    {

    }
}
