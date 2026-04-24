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
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);
        $user = User::create($data);
        return $this->success($user, 'Usuario cadastrado com sucesso!', 201);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);
        $user = User::update($data);
        return $this->success($user, 'Usuario alterado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->success(null, 'Usuario removido com sucesso!');
    }
}
