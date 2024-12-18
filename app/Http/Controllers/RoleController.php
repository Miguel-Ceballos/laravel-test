<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'area' => 'required',
        ]);
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->area,
        ]);
        return response()->json([
            'role' => $role,
            'message' => 'Role created successfully',
            'status' => 201,
        ]);
    }

    public function getRoles()
    {
        try {
            $roles = Role::all();
            return response()->json([
                'roles' => $roles,
                'message' => 'Roles retried successfully',
                'status' => 200,
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
