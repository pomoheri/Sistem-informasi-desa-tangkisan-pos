<?php

namespace App\Http\Controllers\warga;

use App\Mail\NotifyMail;
use App\Models\Kematian;
use App\Models\Penduduk;
use App\Models\Kelahiran;

use Illuminate\Http\Request;
use App\Models\PendudukDatang;
use App\Models\PendudukKeluar;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PermohonanKematianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['penduduk'] = Penduduk::orderBy('nama','asc')->get();
        $data['list'] = Kematian::with('penduduk')->orderBy('created_at', 'desc')->paginate(10);

        return view('warga.kematian.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nik' => 'required',
            'tgl_meninggal' => 'required',
            'tempat_meninggal' => 'required',
            'nama_pelapor' => 'required',
            'hubungan' => 'required',
        ],[
            'nik.required' => 'NIK Wajib Diisi',
            'tgl_meninggal.required' => 'Tanggal Meninggal wajib diisi',
            'tempat_meninggal.required' => 'Tempat Meninggal wajib diisi',
            'nama_pelapor.required' => 'Nama Pelapor wajib diisi',
            'hubungan.required' => 'Hubungan Pelapor wajib diisi'
        ]);
            
        if($request->id_edit){
            $kematian = Kematian::where('id', $request->id_edit)->first();
            if($kematian){
                $kematian->update([
                    'tgl_meninggal'   => $request->tgl_meninggal,
                    'tempat_kematian' => $request->tempat_meninggal,
                    'sebab'           => $request->penyebab,
                    'pelapor'         => $request->nama_pelapor,
                    'hubungan_pelapor'  => $request->hubungan
                ]);
                Penduduk::where('id', $kematian->id_penduduk)->update([
                    'status' => 'Meninggal'
                ]);
            }
        }else{
            $penduduk = Penduduk::where('nik', $request->nik)->update([
                'status' => 'Meninggal'
            ]);

            Kematian::firstOrCreate([
                'id_penduduk'     => $penduduk,
                'tgl_meninggal'   => $request->tgl_meninggal,
                'tempat_kematian' => $request->tempat_meninggal,
                'sebab'           => $request->penyebab,
                'pelapor'         => $request->nama_pelapor,
                'hubungan_pelapor'  => $request->hubungan
            ]);

            $email = 'admin-simdes@tangkisanpos.go.id';

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

    public function delete(Kematian $kematian){
        Penduduk::where('id', $kematian->id_penduduk)->update([
            'status' => null
        ]);
        $kematian->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }
}
