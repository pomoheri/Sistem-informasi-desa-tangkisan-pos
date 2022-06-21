<?php

namespace App\Http\Controllers\warga;

use App\Models\Berita;
use App\Mail\NotifyMail;
use App\Models\Kematian;
use App\Models\Penduduk;

use App\Models\Kelahiran;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use App\Models\PendudukDatang;
use App\Models\PendudukKeluar;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProfilDesaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $data['list'] = ProfilDesa::first();

        return view('warga.profil-desa.index',$data);
    }
}
