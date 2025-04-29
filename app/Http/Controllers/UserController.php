<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::get();
        $query = User::query();
        if ($request->filled('user_role_id')) {
            $query->whereHas('roles', function ($q) use ($request) {
                $q->where('role_id', $request->user_role_id);
            });
        }
        if ($request->filled('data-opt')) {
            if ($request->input('data-opt') === 'active') {
                $query->whereNull('deleted_at');
            } elseif ($request->input('data-opt') === 'deleted') {
                $query->onlyTrashed();
            }
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }
        $users = $query->get();

        return view('roles-permissions.users.lists.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string|unique:users,phone',
            'roles' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }
    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id); // get even deleted

        $userRole = $user->roles->pluck('name')->first(); // Assuming single role
        $user->role = $userRole;

        $roles = Role::pluck('name')->all();

        return response()->json([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|unique:users,phone,' . $id,
            'password' => 'nullable|min:6',
            'roles' => 'required'
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting yourself or the main admin, if needed
        if (auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete(); // soft delete

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('users.index')
            ->with('success', 'User restored successfully.');
    }
    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if (auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account permanently.');
        }

        $user->forceDelete();

        return redirect()->route('users.index')->with('success', 'User permanently deleted.');
    }

    public function exportUsersPdf()
    {
        $users = User::withTrashed()->with('roles')->get(); // Include both soft-deletes and roles
        $pdf = Pdf::loadView('pdfs.users', compact('users'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('users_report_' . date('Y-m-d') . '.pdf');
    }
    public function exportUsersExcel()
    {
        // Implement Excel export logic here
        return Excel::download(new UsersExport, 'users_list_' . date('Y-m-d') . '.xlsx');
    }
    public function exportUsersCsv()
    {
        // Implement CSV export logic here
        return Excel::download(new UsersExport, 'users.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function printUsersPdf()
    {
        $users = User::withTrashed()->with('roles')->get();

        $pdf = Pdf::loadView('pdfs.users', compact('users'));

        // Stream the PDF in-browser instead of downloading
        return $pdf->stream('users_report.pdf');
    }
}
