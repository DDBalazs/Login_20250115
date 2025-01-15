<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function Reg(Request $req){
        $req->validate([
            'name'                          => 'required|min:5|unique:user,name',
            'password'                      => ['required', 'confirmed', Password::min(8)
                                                                                    ->letters()
                                                                                    ->numbers()
                                                                                    ->mixedCase()],
            'password_confirmation'         => 'required',
            'bio'                           => 'required|min:100'
        ],[
            'name.required'                 => 'Kötelező a nevet megadni!',
            'name.min'                      => 'Legalább 5 karakter legyen',
            'name.unique'                   => 'Ez a név már foglalt',
            'password.required'             => 'Kötelező a jelszavat megadni!',
            'password.confirmed'            => 'Nem egyezik a jelszó!',
            'password_confirmation.required'=> 'Kötelező a jelszóismétlést megadni!',
            'bio.required'                  => 'Kötelező bemutatkozót írni!',
            'bio.min'                       => 'Minimum 100 karakternyi szöveget írj!',
            'password.min'                  => 'Minimum 8 karakter legyen a jelszó!',
            'password.numbers'              => 'A jelszónak talrtalmaznia kell számot!',
            'password.letters'              => 'A jelszónak tartalmazni kell betűt!',
            'password.mixed'                  => 'A jelszóban kis és nagy betűnek is kell lennie!',
        ]);

        $data           = new User;
        $data->name     = $req->name;
        $data->password = Hash::make($req->password);
        $data->bio      = $req->bio;

        $data->Save();
        return redirect('/login');
    }

    public function Login(Request $req){
        $req->validate([
            'name'      => 'required',
            'password'  => 'required'
        ]);
        if(Auth::attempt(['name' => $req->name, 'password' => $req->password]))
            return redirect('/');
        else{
            return view('/login', [
                'sv' => 'Nem sikerült'
            ]);
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect('/');
    }

    public function Mypage(){
        if(Auth::check()){
            return view('mypage');
        } else {
            return redirect('/login');
        }
    }
    public function Newpass(){
        
    }
}
