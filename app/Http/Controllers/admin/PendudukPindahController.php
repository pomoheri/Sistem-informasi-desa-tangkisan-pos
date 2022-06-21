<?php

namespace App\Http\Controllers\admin;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\PendudukDatang;
use App\Models\PendudukKeluar;

use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendudukPindahController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['penduduk'] = Penduduk::orderBy('nama','asc')->get();
        $data['list'] = PendudukKeluar::with('penduduk')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.penduduk-pindah.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nik' => 'required|min:16|max:17|string',
            'alasan_pindah' => 'required',
            'rt_asal' => 'required',
            'rw_asal' => 'required'
        ],[
            'nik.required' => 'NIK Wajib Diisi',
            'nik.integer' => 'NIK Wajib Angka',
            'alasan_pindah.required' => 'Alasan Pindah wajib diisi',
            'rt_asal.required' => 'RT asal wajib diisi',
            'rw_asal.required' => 'Rw tujuan wajib diisi'
        ]);

        $data_penduduk = [];
        $data_pindah = [];
        
        $data_pindah = [
            'rt_asal' => $request->rt_asal,
            'rw_asal' => $request->rw_asal,
            'desa_tujuan' => $request->desa_tujuan,
            'kecamatan_tujuan' => $request->kecamatan_tujuan,
            'kabupaten_tujuan' => $request->kabupaten_tujuan,
            'alasan_pindah' => $request->alasan_pindah,
        ];

        $penduduk = Penduduk::where('nik',$request->nik)->first();
        if($penduduk){
            $penduduk->update([
                'status' => 'Pindah'
            ]);
        }
            
        if($request->id_edit){
            PendudukKeluar::where('id',$request->id_edit)->update($data_pindah);
        }else{
            $data_pindah['id_penduduk'] = $penduduk->id;
            PendudukKeluar::firstOrCreate($data_pindah);
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

    public function delete(PendudukKeluar $penduduk_pindah){
        $penduduk_pindah->delete();

        Penduduk::where('id',$penduduk_pindah->id_penduduk)->update([
            'status' => NULL
        ]);

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }

    public function generateSurat(PendudukKeluar $penduduk_pindah){
        $penduduk = Penduduk::where('id',$penduduk_pindah->id_penduduk)->first();
        $data = [
            'title' => 'SURAT KELAHIRAN',
            'date' => date('m/d/Y'),
            'penduduk_pindah' => $penduduk_pindah,
            'penduduk' => $penduduk
        ];
          
        $pdf = PDF::loadView('admin.penduduk-pindah.surat-pindah', $data);

        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/surat/surat-pindah/'.$penduduk->nama,$content);

        Surat::create([
            'jenis_surat' => 'surat Pengantar Pindah'.$penduduk->nama
        ]);

        return $pdf->download('Surat pindah '.$penduduk->nama.'pdf');
    }
}
