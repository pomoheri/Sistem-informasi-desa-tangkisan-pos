@extends('layouts.backend.backend_bs5.main')

@section('title')
   Berita - Warga
@endsection

@section('ribbon')
    <div class="content-header">
        <h4 class="content-title">Berita</h4>
        <div class="content-breadcrumb ms-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card gutter-b">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="content-title mt-0 pt-0 text-muted">Berita</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if ($message = session()->get('message'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($message = session()->get('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $message }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-sm btn-danger" href="{{ route('home') }}"><i class="ri-arrow-left-circle-line"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="table-responsive">
                                    <table id="dt_basic" class="table table-sm table-striped table-bordered table-hover dataTable" aria-describedby="datatables_info" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">No</th>
                                                <th class="text-center align-middle">Berita</th>
                                                <th class="text-center align-middle">Foto</th>
                                                <th class="text-center align-middle">Deskripsi</th>
                                                <th class="text-center align-middle">Tgl Berita</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($list as $key => $item)
                                                <tr>
                                                    <td>{{ ($list->currentpage()-1) * $list->perpage() + $key + 1 }}</td>
                                                    <td>{{ $item->berita }}</td>
                                                    <td>
                                                        @php
                                                            $cek_file = ($item->foto)? 'public/upload/file_berita/'.$item->foto: '';
                                                            $path = ($item->foto)? Storage::url('upload/file_berita/'.$item->foto) : '';
                                                        @endphp
                                                        @if(Storage::exists($cek_file))
                                                            <img src="{{ url($path) }}" alt="Foto Berita" height="100px" width="100px">
                                                        @else
                                                            <img src="{{ url('assets_bs5/img/No-image-available.png') }}" alt="" height="100px" width="100px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->deskripsi }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="7">Data Kosong</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $list->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    <script type="text/javascript">
        csrf_token = '{{ csrf_token() }}';
    </script>
@endsection