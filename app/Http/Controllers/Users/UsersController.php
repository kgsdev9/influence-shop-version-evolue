<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('dashboard.users.index', compact('users', 'roles'));
    }




    public function store(Request $request)
    {
        $userId = $request->input('user_id');

        if ($userId) {
            // Si `user_id` existe, on met à jour l'utilisateur
            $user = User::find($userId);

            if (!$user) {
                return $this->createUser($request);
            }

            return $this->updateUser($user, $request);
        } else {
            // Sinon, on crée un nouvel utilisateur
            return $this->createUser($request);
        }
    }

    private function updateUser($user, Request $request)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $user->load('role');

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user,
        ], 200);
    }

    private function createUser(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        $user->load('role');
        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'user' => $user,
        ], 201);
    }
}
