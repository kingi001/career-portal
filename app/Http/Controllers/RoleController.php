<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name')->get();
        $permissions = Permission::orderBy('name')->get(); // Fetch all permissions

        return view('roles-permissions.roles.lists.index', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created Role.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')],
        ]);

        Role::create([
            'name' => strtolower($request->name),
            'guard_name' => 'web',
        ]);

        return redirect()->route('roles.index')->with('success', 'Role added successfully!');
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return response()->json($role);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($role->id)],
        ]);

        $role->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    public function addPermissionToRole(Role $role)
    {
     $permissions = Permission::get();
     $role=Role::findOrFail($role->id);
     return view('roles-permissions.roles.add-permission', compact('role','permissions'));
    }
    public function givePermissionToRole(Request $request, Role $role)
    {
        $request ->validate([
            'permissions' => 'required'
        ]);
        $role = Role::findOrFail($role->id);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Permissions assigned to role successfully!');
    }

    /**
     * Remove the specified Role.
     */
    public function destroy(Role $role)
    {
        $role = Role::findOrFail($role->id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
