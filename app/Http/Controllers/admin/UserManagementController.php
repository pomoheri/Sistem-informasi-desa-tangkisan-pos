<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['user'] = User::orderBy('name','asc')->get();

        return view('admin.user.index',$data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'level_akses' => 'required',
        ],[
            'name.required' => 'name wajib diisi',
            'email.required' => 'email Wajib Diisi',
            'email.unique' => 'email sudah dipakai',
            'password.required' => 'password Wajib Diisi',
            'level_akses.required' => 'level_akses Wajib Diisi'
        ]);

        if($request->id_edit){
            User::where('id',$request->id_edit)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level_akses' => $request->level_akses
            ]);
        }else{
            $this->validate($request,[
                'email' => 'unique:users'
                ],[
                    'email.unique' => 'Email Sudah Di Pakai'
                ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level_akses' => $request->level_akses
            ]);
        }

        return redirect()->back()->with('message','Data Berhasil Disimpan');
    }
}
