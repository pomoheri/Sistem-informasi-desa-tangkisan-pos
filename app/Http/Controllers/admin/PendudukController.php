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
        $data['penduduk'] = Penduduk::orderBy('nama', 'asc')->get();

        return view('admin.penduduk.index',$data);
    }
}
