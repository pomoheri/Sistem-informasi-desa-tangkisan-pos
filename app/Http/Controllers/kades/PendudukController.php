<?php

namespace App\Http\Controllers\kades;

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

class PendudukController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $data['penduduk'] = Penduduk::orderBy('nama','asc')->paginate();

        return view('kades.penduduk.index',$data);
    }
}
