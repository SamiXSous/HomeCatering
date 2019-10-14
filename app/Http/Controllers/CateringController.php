<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Catering;

class CateringController extends Controller
{
    public function __construct()
    {
        $this->middleware('seller');
    }

    public function cateringList()
    {
        $id = Auth::id();
        $caterings = Catering::where('adminId', $id)->get();
        // var_dump($catering);

        return view('catering.caterings', compact('caterings'));
    }

    public function editCatering()
    {
        $id = Auth::id();
        $catering = Catering::where('adminId', $id)->first();
        // var_dump($catering);

        return view('catering.editCatering', compact('catering'));
    }

    public function updateCatering(Request $request)
    {
        $user = Auth::user();

        // if ($request->input('role') == 1) {
        //     Catering::firstOrCreate(['admin_id' => $id]);
        // }
        if ($request->input('active') == null) {
            $active = false;
        } else {
            $active = true;
        }
        if ($user->role >= 2) {
            Catering::where('adminId', $user->id)
                ->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'active' => $active
                ]);
        }
        // $roles = Role::all();
        // $affected = DB::table('users')
        //     ->where('id', $id)
        //     ->update(['options->enabled' => true]);

        return redirect('/mycatering');
    }
}
