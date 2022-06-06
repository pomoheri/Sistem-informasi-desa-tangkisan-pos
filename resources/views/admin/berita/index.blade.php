@extends('layouts.backend.backend_bs5.main')

@section('title')
   Berita - Admin
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
                                <h4 class="content-title mt-0 pt-0 text-muted">Data Berita</h4>
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
                                <button class="btn btn-sm btn-primary" onclick="tambahBerita()"><i class="ri-add-box-fill"></i> Tambah</button>
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
                                                <th class="text-center align-middle">Deskripsi</th>
                                                <th class="text-center align-middle">Foto</th>
                                                <th class="text-center align-middle">Tgl Berita</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($berita as $key => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->berita }}</td>
                                                    <td>{{ $item->deskripsi }}</td>
                                                    <td class="text-center">
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
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-warning" data-item="{{ $item }}" onclick="editBerita(this)"><i class="ri-edit-2-line"></i></button>
                                                        <a href="{{ route('admin.berita.delete',[$item]) }}" class="btn btn-sm btn-danger delete"><i class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="6">Data Kosong</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add & Edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title updatePJP" id="exampleModalLabel"><strong>Data Berita</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formdetail" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Hidden -->
                            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id_edit" id="id_edit" />
                            <!-- End Hidden -->
                            <div class="col-sm-12">
                                <label>Berita :</label>
                                <input type="text" class="form-control input-sm" id="berita" name="berita" value="">
                                @error('berita')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Deskripsi :</label>
                                <textarea class="form-control input-sm" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                @error('deskripsi')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Foto :</label>
                                <input class="form-control input-sm" type="file" name="file" id="file">
                                @error('file')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <img id="preview_foto" src="#" alt="your image" height="100px" width="100px"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    <script type="text/javascript">
        csrf_token = '{{ csrf_token() }}';

        function tambahBerita(){
            $('#id_edit').val('')
            $('#berita').val('')
            $('#deskripsi').val('')
            $('#file').val('')

            $('#modal-edit').modal('show')
        }

        function editBerita(obj){
            var item = $(obj).data('item');
            console.log(item)
            $('#id_edit').val(item.id)
            $('#berita').val(item.berita)
            $('#deskripsi').val(item.deskripsi)

            $('#modal-edit').modal('show')
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file").change(function(){
            readURL(this);
        });

        $(document).on('click',".delete",function(e)
        {
            e.preventDefault()
            url = $(this).attr('href')
            Swal.fire({
                title: 'Yakin Untuk Hapus Data Tersebut ?',
                confirmButtonColor: '#386cb4',
                showCancelButton: false,
                showDenyButton: true,
                confirmButtonText: 'Ya',
                denyButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                window.location.href = url
                } else if (result.isDenied) {
                Swal.close()
                }
            })
        })
    </script>
@endsection