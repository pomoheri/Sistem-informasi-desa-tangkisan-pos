<?php

namespace App\Http\Controllers\admin;

use App\Models\Surat;
use App\Mail\NotifyMail;
use App\Models\Kematian;
use App\Models\Penduduk;

use App\Models\Kelahiran;
use Illuminate\Http\Request;
use App\Models\PendudukDatang;
use App\Models\PendudukKeluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class KematianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['penduduk'] = Penduduk::orderBy('nama','asc')->get();
        $data['list'] = Kematian::with('penduduk')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.kematian.index',$data);
    }

    public function generateSurat(Kematian $kematian){
        $penduduk = Penduduk::where('id',$kematian->id_penduduk)->first();
        $data = [
            'title' => 'SURAT KELAHIRAN',
            'date' => date('m/d/Y'),
            'kematian' => $kematian,
            'penduduk' => $penduduk
        ];
          
        $pdf = PDF::loadView('admin.kematian.surat-kematian', $data);

        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/surat/surat-kematian/'.$penduduk->nama,$content);
        $kematian->update([
            'surat_kematian' => 'public/surat/surat-kematian/'.$penduduk->nama
        ]);

        Surat::create([
            'jenis_surat' => 'surat kematian'.$penduduk->nama
        ]);
    
        return $pdf->download('Surat Kematian '.$penduduk->nama.'pdf');
    }
}
