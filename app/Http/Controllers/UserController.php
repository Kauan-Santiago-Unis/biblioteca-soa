<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $this->success($users, 'Usuarios listados com sucesso!');
    }

    public function show(User $user)
    {
        return $this->success($user, 'Usuario encontrado com sucesso!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|max:50|unique:users,email',
            'password' => 'required|string|min:6|max:50',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $this->success($user, 'Usuario cadastrado com sucesso!', 201);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:6|max:255',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return $this->success($user, 'Usuario alterado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->success(null, 'Usuario removido com sucesso!');
    }
}
