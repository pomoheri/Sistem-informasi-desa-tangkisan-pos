<?php

namespace App\Http\Controllers\admin;

use App\Models\Surat;
use App\Mail\NotifyMail;
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

class KelahiranController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['penduduk'] = Penduduk::orderBy('nama','asc')->get();
        $data['list'] = Kelahiran::with('penduduk')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.kelahiran.index',$data);
    }

    public function generateSurat(Kelahiran $kelahiran){
        $data = [
            'title' => 'SURAT KELAHIRAN',
            'date' => date('m/d/Y'),
            'kelahiran' => $kelahiran
        ];
          
        $pdf = PDF::loadView('admin.kelahiran.surat-kelahiran', $data);

        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/surat/surat-kelahiran/'.$kelahiran->nama_bayi,$content);
        $kelahiran->update([
            'surat_lahir' => 'public/surat/surat-kelahiran/'.$kelahiran->nama_bayi
        ]);

        Surat::create([
            'jenis_surat' => 'surat kelahiran'.$kelahiran->nama_bayi
        ]);
    
        return $pdf->download('Surat Kelahiran '.$kelahiran->nama_bayi.'pdf');
    }
}
