<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\RegisterUsersRequest; // Validar informacion de los datos de registro de usuarios
use App\Http\Requests\ValidatedAuthUserRequest; // Validación de información de los datos de registro de usuarios

class UsersController extends Controller
{
    public function index()
    {
    	return view('users.login.login');
    }

    public function register()
    {
    	return view('users.login.register');
    }

    public function signup (RegisterUsersRequest $request, User $user)
    {
    	User::create($request->only("name", "email") + ["password" => $user->encrypt($request->password)]);
    	return redirect()->route('login');
    }


    public function authenticate(ValidatedAuthUserRequest $request, User $user)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

            return redirect()->intended('notes');
        }
        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        //Invalida la sesión y genera una nueva
        $request->session()->invalidate();
        // Genera un nuevo Token
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
