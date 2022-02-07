<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //C
    public function create()
    {
        return view('users.create');
    }

    public function insert(Request $form)
    {
        $user = new User();

        $user->name = $form->name;
        $user->username = $form->username;
        $user->email = $form->email;
        $user->password = Hash::make($form->password);

        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }

    //R
    public function profile(User $user)
    {
        return view('users.profile', ['user' => $user]);
    }

    //U
    public function update(Request $form, User $user)
    {
        $user->name = $form->name;

        $user->save();

        return redirect()->route('users');
    }
    
    //D
    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users');
    }

    // login/logout
    public function login(Request $form)
    {
        // check form 
        if ($form->isMethod('POST')) {
            $credentials = $form->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            
            // remenber token
            if ($form->remember != null) {
                if (Auth::attempt($credentials, true)) {
                    // login success
                    session()->regenerate();
                    return redirect()->route('home');
                } else {
                    // login error
                    return redirect()->route('login')->with(
                        'erro',
                        'Usuário ou senha inválidos.'
                    );
                }
            }else{
                if (Auth::attempt($credentials)) {
                    // login success
                    session()->regenerate();
                    return redirect()->route('home');
                } else {
                    // login error
                    return redirect()->route('login')->with(
                        'erro',
                        'Usuário ou senha inválidos.'
                    );
                }
            }
        }
        
        return view('usuarios.login');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
