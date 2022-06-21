<?php

namespace App\Http\Controllers\admin;

use App\Mail\NotifyMail;
use App\Models\Kematian;
use App\Models\Penduduk;
use App\Models\Kelahiran;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use App\Models\PendudukDatang;
use App\Models\PendudukKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['list'] = ProfilDesa::first();

        return view('admin.profil-desa.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_desa' => 'required',
            'no_telp' => 'required|string|max:13',
            'alamat_desa' => 'required'
        ],[
            'nama_desa.required' => 'Nama Desa wajib diisi',
            'no_telp.required' => 'No telp wajib diisi',
            'alamat_desa.required' => 'Alamat desa wajib diisi'
        ]);

        if($request->id_edit){
            $profil_desa = ProfilDesa::where('id', $request->id_edit)->first();
            $profil_desa->update([
                'nama_desa' => $request->nama_desa,
                'no_telp' => $request->no_telp,
                'alamat_desa' => $request->alamat_desa,
                'nama_lurah' => $request->nama_lurah
            ]);

        }else{
            ProfilDesa::firstOrCreate([
                'nama_desa' => $request->nama_desa,
                'no_telp' => $request->no_telp,
                'alamat_desa' => $request->alamat_desa,
                'nama_lurah' => $request->nama_lurah
            ]);
        }

        return redirect()->back()->with('message', 'Data Berhasil disimpan');
    }

    public function delete(ProfilDesa $profil){
        $profil->delete();

        return redirect()->back()->with('message', 'Data Berhasil dihapus');
    }
}
