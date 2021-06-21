<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('account.index');
    }

    public function index()
    {

        $users = User::all();
        return view('admin.account.index', [
            'users' => $users
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);;
        return view('admin.account.edit', [
            'user' => $user,

        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

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
//        if ($user) {
//            return redirect()->route('account.index');
//        }

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('account.index');
    }
}






