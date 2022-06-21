<?php

namespace App\Http\Controllers\admin;

use App\Models\Surat;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\PendudukDatang;

use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendudukDatangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['list'] = PendudukDatang::with('penduduk')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.penduduk-datang.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nik' => 'required|min:16|max:17|string',
            'nama' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alasan_pindah' => 'required',
            'desa_asal' => 'required',
            'rw_tujuan' => 'required'
        ],[
            'nik.required' => 'NIK Wajib Diisi',
            'nik.integer' => 'NIK Wajib Angka',
            'nama.required' => 'Nama Wajib diisi',
            'jenkel.required' => 'Jenis kelamin wajib diisi',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tgl_lahir.required' => 'Tgl Lahir Wajib diisi',
            'alasan_pindah.required' => 'Alasan Pindah wajib diisi',
            'desa_asal.required' => 'Desa asal wajib diisi',
            'rw_tujuan.required' => 'Rw tujuan wajib diisi'
        ]);

        $data_penduduk = [];
        $data_datang = [];
        $data_penduduk =[
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'alamat' => $request->rt_tujuan.','.$request->rw_tujuan,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'pendidikan' => $request->pendidikan
        ];
        
        $data_datang = [
            'rt_tujuan' => $request->rt_tujuan,
            'rw_tujuan' => $request->rw_tujuan,
            'rt_asal' => $request->rt_asal,
            'rw_asal' => $request->rw_asal,
            'desa_asal' => $request->desa_asal,
            'kecamatan_asal' => $request->kecamatan_asal,
            'alasan_pindah' => $request->alasan_pindah,
        ];
            
        if($request->id_edit){
            PendudukDatang::where('id',$request->id_edit)->update($data_datang);
        }else{
            $cek_penduduk = Penduduk::where('nik',$request->nik)->first();
            if($cek_penduduk){
                return redirect()->back()->withErrors(['msg' => 'Data NIK Sudah ada!']);
            }else{
                $penduduk = Penduduk::firstOrCreate($data_penduduk);
                $data_datang['id_penduduk'] = $penduduk->id;
                PendudukDatang::firstOrCreate($data_datang);
            }
        }

        return redirect()->back()->with('message','Data Berhasil Disimpan');
    }

    public function delete(PendudukDatang $penduduk_datang){
        $penduduk_datang->delete();

        Penduduk::where('id',$penduduk_datang->id_penduduk)->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }

    public function generateSurat(PendudukDatang $penduduk_datang){
        $penduduk = Penduduk::where('id',$penduduk_datang->id_penduduk)->first();
        $data = [
            'title' => 'SURAT KELAHIRAN',
            'date' => date('m/d/Y'),
            'penduduk_datang' => $penduduk_datang,
            'penduduk' => $penduduk
        ];
          
        $pdf = PDF::loadView('admin.penduduk-datang.surat-datang', $data);

        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/surat/surat-datang/'.$penduduk->nama,$content);

        Surat::create([
            'jenis_surat' => 'surat Pengantar Datang'.$penduduk->nama
        ]);

        return $pdf->download('Surat datang '.$penduduk->nama.'pdf');
    }
}
