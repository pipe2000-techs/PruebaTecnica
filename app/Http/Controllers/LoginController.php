<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function validate(storeUserRequest $request)
    {
        /*
        User::create([
        'name' => 'andres gonzalez',
        'email' => 'agonzalez@gmail.com',
        'password' => bcrypt('123456')]);
        */

        $datos = $request->only('email','password');

        $remmenber = $request->filled('remember');

        if (Auth::attempt($datos, $remmenber)) { //el true es para recordar la session
            $request->session()->regenerate();
            return redirect('empleados');
        }
        
        return redirect('login')->with('error','Usuario o contraseña incorrectos');

    }

    public function logout(Request $request)
    {

        Auth::logout();   

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');

    }

}
