<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller
{

    public function postSignUp(Request $request)
    {
         $this->validate($request, $rules = [
            'email' => 'required|email|unique:users',
            'username' => 'required|max:120',
            'password' => 'required|min:4'
        ], $messages = [
            'email.required' => 'Необходимо указать email',
            'username.required' => 'Необходимо указать имя',
            'password.required' => 'Необходимо указать пароль',
            'email.email' => 'Необходимо ввести коректный пароль',
            'max' => 'Кол-во символов не должно превышать 120',
            'min' => 'Минимальное кол-во символов 4',
            'email.unique' => 'Значение поля email должно быть уникальным'
        ]);



        $user = new User;
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->password = Hash::make($request['password']);

        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request, $rules = [
            'email' => 'required',
            'password' => 'required'
        ], $messages = [
            'email.required' => 'Необходимо указать email',
            'password.required' => 'Необходимо указать пароль'
        ]);

       if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
       {
            return redirect()->route('dashboard');
       }
        return redirect()->back();
    }

    public function getLogOut()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

}