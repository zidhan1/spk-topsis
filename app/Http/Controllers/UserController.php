<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //  View 
    public function index()
    {
        $data = User::leftjoin('siswa', 'users.username', '=', 'siswa.nomor_pendaftaran')->orderBy('users.role', 'desc')->get();
        return view('admin.deleteuser', compact('data'));
    }

    public function destroy($id)
    {
        $data = User::where('username', '=', $id)->first();
        $data->delete();
        return redirect('/deleteuser');
    }
}
