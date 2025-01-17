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
        if(Auth::check()){
            return view('newpass');
        } else {
            return redirect('/login');
        }
    }
    public function NewpassData(Request $req){
        $req->validate([
            'oldpassword'       => 'required',
            'newpassword'       => ['required', 'confirmed', Password::min(8)
                                                                    ->letters()
                                                                    ->numbers()
                                                                    ->mixedCase()],
            'newpassword_confirmation'  => 'required'
        ],[
            'oldpassword.required'                  => 'Kötelező megadni!',
            'newpassword.required'                  => 'Kötelező megadni!',
            'newpassword.confirmed'                 => 'Nem egyezik a kettő jelszó!',
            'newpassword.confirmed.required'        => 'Kötelező megadni!',
            'newpassword_confirmation.required'     => 'Kötelező megadni!',
            'newpassword.min'                       => 'Minimum 8 karakter hosszú legyen!',
            'newpassword.mixed'                     => 'Kis és nagybetűket is kell tartalmazni!',
            'newpassword.numbers'                   => 'A jelszónak tartalmazni kell számot is!',
            'newpassword.letters'                   => 'A jelszónak tartalmazni kell betűt is!',
        ]);

        if(Hash::check($req->oldpassword, Auth::user()->password)){
            $data       = User::find(Auth::user()->id);
            $data->password = Hash::make($req->newpassword);
            $data->Save();
            return view('mypage', [
                'sv'    => 'A jelszava megváltott'
            ]);
        } else {
            return view('newpass', [
                'sv'    => 'Nem sikerült megváltoztatni a jelszavát! :c'
            ]);
        }
    }

    public function Del(){
        if(Auth::check()){
            return view('/del');
        }
        else{
            return redirect('/login');
        }
    }

    public function Exit(){
        if(Auth::check()){
            $data = User::find(Auth::user()->id);
            $data->delete;
            Auth::logout();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }
}
