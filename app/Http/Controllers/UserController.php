<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.user', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('error', 'Usuario eliminado correctamente.');
    }

    public function changeRole(User $user)
    {
        if ($user->hasRole('admin')) {
            $user->removeRole('admin');
            $user->assignRole('user');
        } else {
            $user->removeRole('user');
            $user->assignRole('admin');
        }

        return redirect()->route('user.index')->with('success', 'Rol cambiado correctamente.');
    }
}
