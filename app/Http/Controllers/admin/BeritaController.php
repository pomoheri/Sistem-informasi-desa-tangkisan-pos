<?php

namespace App\Http\Controllers\admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data['berita'] = Berita::orderBy('created_at', 'desc')->get();

        return view('admin.berita.index',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'berita' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ],[
            'berita.required' => 'Judul Berita Wajib Diisi',
            'file.required' => 'Foto Wajib Diisi'
        ]);

        $uploadDokumen = null;
        $originalnameDokumen = null;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $originalnameDokumen = $file->getClientOriginalName();
            $path = Storage::putFileAs('public/upload/file_berita', $file, $originalnameDokumen); 
        }

        if($request->id_edit){
            $fileBerita = Berita::find($request->id_edit);
            $cek_file = 'public/file_berita/'.$fileBerita->foto;
            if( Storage::exists($cek_file)){
                Storage::delete($cek_file);
            }
            $fileBerita->update([
                'berita' => $request->berita,
                'deskripsi' => $request->deskripsi,
                'foto'  => $originalnameDokumen,
                'id_user' => Auth::user()->id
            ]);
            
        }else{
            Berita::create([
                'berita' => $request->berita,
                'deskripsi' => $request->deskripsi,
                'foto'  => $originalnameDokumen,
                'id_user' => Auth::user()->id
            ]);
        }

        return redirect()->back()->with('message','Data Berhasil Disimpan');

    }

    public function delete(Berita $berita){
        $berita->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }
}
