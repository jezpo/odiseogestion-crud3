<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Role;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Role::all());
        }

        return view('roles.index');
    }

    public function store(Request $request)
    {
        try {
            $role = Role::create($request->all());
            return response()->json(['message' => 'Role created successfully', 'data' => $role], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating role', 'error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, Role $role)
    {
        try {
            $role->update($request->all());
            return response()->json(['message' => 'Role updated successfully', 'data' => $role]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating role', 'error' => $e->getMessage()], 400);
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return response()->json(['message' => 'Role deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting role', 'error' => $e->getMessage()], 400);
        }
    }
}