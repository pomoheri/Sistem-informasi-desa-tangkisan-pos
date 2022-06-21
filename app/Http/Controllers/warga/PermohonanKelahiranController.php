<?php

namespace App\Http\Controllers\warga;

use App\Mail\NotifyMail;
use App\Models\Penduduk;
use App\Models\Kelahiran;
use Illuminate\Http\Request;

use App\Models\PendudukDatang;
use App\Models\PendudukKeluar;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PermohonanKelahiranController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['penduduk'] = Penduduk::orderBy('nama','asc')->get();
        $data['list'] = Kelahiran::with('penduduk')->orderBy('created_at', 'desc')->paginate(10);

        return view('warga.kelahiran.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_bayi' => 'required',
            'tempat_lahir_bayi' => 'required',
            'tgl_lahir_bayi' => 'required',
            'jenkel_bayi' => 'required',
            'penolong' => 'required',
        ],[
            'nama_bayi.required' => 'Nama Bayi Wajib Diisi',
            'tempat_lahir_bayi.required' => 'Tempat lahir Bayi wajib diisi',
            'tgl_lahir_bayi.required' => 'Tgl Lahir Bayi wajib diisi',
            'jenkel_bayi.required' => 'Jenis Kelamin Bayi wajib diisi',
            'penolong.required' => 'Penolong wajib diisi'
        ]);
            
        if($request->id_edit){
            $kelahiran = Kelahiran::where('id', $request->id_edit)->first();
            if($kelahiran){
                $kelahiran->update([
                    'nama_bayi'        => $request->nama_bayi,
                    'tgl_lahir'   => $request->tgl_lahir_bayi,
                    'jenkel'      => $request->jenkel_bayi,
                    'tempat_lahir' => $request->tempat_lahir_bayi,
                    'penolong'  => $request->penolong
                ]);
                Penduduk::where('id', $kelahiran->id_penduduk)->update([
                    'nama' => $request->nama_bayi,
                    'jenkel' => $request->jenkel_bayi,
                    'alamat' => $request->alamat,
                    'tgl_lahir' => $request->tgl_lahir_bayi,
                    'tempat_lahir' => $request->tempat_lahir_bayi,
                ]);
            }
        }else{
            $penduduk = Penduduk::firstOrCreate([
                            'nik'  => '3310'.str_replace("-", "", $request->tgl_lahir).str_replace(":", "", date('H:i')),
                            'nama' => $request->nama_bayi,
                            'jenkel' => $request->jenkel_bayi,
                            'alamat' => $request->alamat,
                            'tgl_lahir' => $request->tgl_lahir_bayi,
                            'tempat_lahir' => $request->tempat_lahir_bayi,
                        ]);
            Kelahiran::firstOrCreate([
                'id_penduduk' => $penduduk->id,
                'nama_bayi'        => $request->nama_bayi,
                'tgl_lahir'   => $request->tgl_lahir_bayi,
                'jenkel'      => $request->jenkel_bayi,
                'tempat_lahir' => $request->tempat_lahir_bayi,
                'penolong'  => $request->penolong
            ]);
            $email = 'admin0=-simdes@tangkisanpos.go.id';

            Mail::to($email)->send(new NotifyMail());
        }

        return redirect()->back()->with('message','Data Berhasil Disimpan');
    }

    public function getPenduduk($id){
        $penduduk = Penduduk::where('nik',$id)->first();
        if($penduduk){
            $status = TRUE;
        }else{
            $status = FALSE;
        }
        return response()->json([
            "status" => $status,
            "data" => $penduduk
        ]);
    }

    public function delete(Kelahiran $kelahiran){
        Penduduk::where('id', $kelahiran->id_penduduk)->delete();
        $kelahiran->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }
}
