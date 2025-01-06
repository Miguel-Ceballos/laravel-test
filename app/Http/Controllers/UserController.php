<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make('12345678'),
        ]);
        $role = Role::where('name', $request->role)->first();
        $user->assignRole($role);
        return response()->json([
            'user' => $user,
            'message' => 'User created successfully',
            'status' => 201,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::find($id);
            $user->roles->pluck('name');
//            $isManager = array_search('Gerente de Ventas', $user->roles->pluck('name')->toArray());
//            $isManager = in_array('Gerente', $user->roles->pluck('name')->toArray());
            $isExistsManager = array_filter($user->roles->pluck('name')->toArray(), function ($role) {
                return str_contains($role, 'Gerente');
            });

            count($isExistsManager) > 0 ? $isManager = true : $isManager = false;

            return response()->json([
                'user' => $user,
                'isManager' => $isManager,
                'message' => 'User retrieved successfully',
                'roles' => $user->roles->pluck('name'),
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getUsers()
    {
        try {
            if (Auth::user()->hasRole('Administrador')) {
                $users = User::all();
            } else {
                $currentUser = Auth::user();
                $guardNames = $currentUser->roles->pluck('guard_name');

                // Recupera los usuarios que tienen roles con los mismos guard_name
                $users = User::whereHas('roles', function ($query) use ($guardNames) {
                    $query->whereIn('guard_name', $guardNames);
                })->get();

//                $user = Auth::user()->getRoleNames();
//                $roles = Role::whereIn('name', $user)->get()->pluck('guard_name');
//                $roles_by_guard = Role::whereIn('guard_name', $roles)->get()->pluck('name');
//                # Recupera los usuarios con los roles que tienen el guard_name del usuario actual
//                $users = User::with('roles')->get()->filter(
//                    fn($user) => $user->roles->whereIn('name', $roles_by_guard)->toArray()
//                );
            }
            return response()->json([
                'users' => $users,
                'message' => 'Users retried successfully',
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
