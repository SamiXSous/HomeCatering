<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Catering;
use App\Notifications\VerifyCatering;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.index', compact('users'), compact('roles'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.editUser', compact('user'), compact('roles'));
    }

    public function updateUser(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'role' => $request->input('role'),
            ]);
        if ($request->input('role') == 1) {
            Catering::where(['adminId' => $id])->delete();
        }
        if ($request->input('role') == 2) {
            Catering::firstOrCreate(['adminId' => $id]);
            $catering = Catering::where(['adminId' => $id])->first();

            User::find($id)->notify(new VerifyCatering($catering));
        }
        // $roles = Role::all();
        // $affected = DB::table('users')
        //     ->where('id', $id)
        //     ->update(['options->enabled' => true]);

        return redirect('/admin/AllUsers');
    }
}
