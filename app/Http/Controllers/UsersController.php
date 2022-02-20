<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //Create
    public function register()
    {
        return view('users.register');
    }

    public function new(Request $form)
    {
        $user = new User();

        $user->name = $form->name;
        $user->username = $form->username;
        $user->email = $form->email;
        $user->password = Hash::make($form->password);

        $user->save();
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('posts.home');
    }

    //Read
    public function RView(User $user)
    {
        $posts = $user->posts()->get();

        return view('users.show', ['page' => 'profile', 'user' => $user, 'posts' => $posts]);
    }

    //Update
    public function UView(User $user)
    {
        return view('users.edit', ['page' => 'profile', 'user' => $user]);
    }

    public function UAction(Request $form, User $user)
    {
        if (Hash::check($form->password, Auth::user()->password)) {

            $user->name = $form->name;
            $user->email = $form->email;

            $user->save();

            return redirect()->route('users.profile', Auth::user()->id)->with('msg', 'sucesso na alteração.');
        } else {
            return redirect()->route('users.profile', Auth::user()->id)->with('msg', 'sua senha está incorreta.');
        }
    }

    //Delete
    public function DAction(Request $form, User $user)
    {
        if (Hash::check($form->password, Auth::user()->password)) {

            $posts = $user->posts();

            foreach ($posts as $post) {
                $post->delete();
            }

            $user->delete();

            return redirect()->route('users.register');
        } else {
            return redirect()->route('users.profile', Auth::user()->id)->with('msg', 'sua senha está incorreta.');
        }

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

            // remember token
            if ($form->remember != null) {
                if (Auth::attempt($credentials, true)) {
                    // login success
                    session()->regenerate();
                    return redirect()->route('posts.home');
                } else {
                    // login error
                    return redirect()->route('users.login')->with(
                        'erro',
                        'Usuário ou senha inválidos.'
                    );
                }
            } else {
                if (Auth::attempt($credentials)) {
                    // login success
                    session()->regenerate();
                    return redirect()->route('posts.home');
                } else {
                    // login error
                    return redirect()->route('users.login')->with(
                        'erro',
                        'Usuário ou senha inválidos.'
                    );
                }
            }
        }

        return view('users.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login');
    }
}
