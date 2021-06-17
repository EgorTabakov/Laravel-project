<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return "Добро пожаловать: " . \Auth::user()->name . "<br>
            <a href ='" . route('news.index') . "'>В админку</a><br>
            <a href='" . route('account.logout') . "'>Выход</a><br>
            <a href='" . route('account.edit') . "'>Редактировать профиль</a>";
    }

    public function index()
    {

        $users = User::all();
        return view('admin.account.index', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {

        return view('admin.account.edit', [
            'user' => $user,

        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $user->id],
            'password' => ['required'],
            'newPassword' => ['required'],
            'is_admin' => ['required'],
        ]);

        $errors = [];

        $fields = $request->only('name', 'email', 'password', 'newPassword', 'is_Admin');

        if (Hash::check('password', $user->password)) {

            $user = $user->fill($fields)->save();
            return redirect()->route('account.index')->withErrors($errors);

             } else {
                 $errors['password'][] = 'Неверный пароль';
        }
        if ($user) {
            return redirect()->route('account.index');}

    }


    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('account.index');
    }
}






