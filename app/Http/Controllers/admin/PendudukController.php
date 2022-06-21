<?php

namespace App\Http\Controllers\admin;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\DataTables;

class PendudukController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['penduduk'] = Penduduk::whereNull('status')->orderBy('nama', 'asc')->paginate(10);

        return view('admin.penduduk.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nik' => 'required|min:16|max:17|string',
            'nama' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required'
        ],[
            'nik.required' => 'NIK Wajib Diisi',
            'nik.integer' => 'NIK Wajib Angka',
            'nama.required' => 'Nama Wajib diisi',
            'jenkel.required' => 'Jenis kelamin wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tgl_lahir.required' => 'Tgl Lahir Wajib diisi'
        ]);

        $data = [];
        $data =[
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan
        ];

        if($request->id_edit){
            Penduduk::where('id', $request->id_edit)->update($data);
        }else{
            Penduduk::firstOrCreate($data);
        }

        return redirect()->back()->with('message','Data Berhasil Disimpan');
    }

    public function delete(Penduduk $penduduk){
        $penduduk->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }
}
