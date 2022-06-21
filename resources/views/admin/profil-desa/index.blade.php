@extends('layouts.backend.backend_bs5.main')

@section('title')
   Profil Desa - Admin
@endsection

@section('ribbon')
    <div class="content-header">
        <h4 class="content-title">Profil Desa</h4>
        <div class="content-breadcrumb ms-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil Desa</li>
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
                                <h4 class="content-title mt-0 pt-0 text-muted">Data Profil Desa</h4>
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
                                @if(!$list)
                                <button class="btn btn-sm btn-primary" onclick="tambahProfil()"><i class="ri-add-box-fill"></i> Tambah</button>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="table-responsive">
                                    <table id="dt_basic" class="table table-sm table-striped table-bordered table-hover dataTable" aria-describedby="datatables_info" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Nama Desa</th>
                                                <th class="text-center align-middle">No Telp</th>
                                                <th class="text-center align-middle">Nama Lurah</th>
                                                <th class="text-center align-middle">Alamat Desa</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($list)
                                            <tr>
                                                <td>{{ $list->nama_desa }}</td>
                                                <td>{{ $list->no_telp }}</td>
                                                <td>{{ $list->nama_lurah }}</td>
                                                <td>{{ $list->alamat_desa }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-warning" data-item="{{ $list }}" onclick="editProfil(this)"><i class="ri-edit-2-line"></i></button>
                                                    <a href="{{ route('admin.profil-desa.delete',[$list]) }}" class="btn btn-sm btn-danger delete"><i class="ri-delete-bin-line"></i></a>
                                                </td>
                                            </tr>
                                            @endif
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

    <!-- Modal edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Data Profil Desa</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formdetail" action="{{ route('admin.profil-desa.store') }}">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Hidden -->
                            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id_edit" id="id_edit" />
                            <!-- End Hidden -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label>Nama Desa :</label>
                                <input class="form-control" type="text" name="nama_desa" id="nama_desa">
                                @error('nama_desa')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>No Telp :</label>
                                <input class="form-control" type="text" name="no_telp" id="no_telp">
                                @error('no_telp')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Nama Lurah :</label>
                                <input class="form-control" type="text" name="nama_lurah" id="nama_lurah">
                                @error('nama_lurah')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Alamat Desa:</label>
                                <textarea class="form-control" name="alamat_desa" id="alamat_desa" cols="30" rows="10"></textarea>
                                @error('alamat_desa')<label class="text-danger">{{$message}}</label>@enderror
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

        function tambahProfil(){
            $('#id_edit').val('')
            $('#nama_desa').val('')
            $('#no_telp').val('')
            $('#nama_lurah').val('')
            $('#alamat_desa').val('')

            $('#modal-edit').modal('show')
        }

        function editProfil(obj){
            var item = $(obj).data('item');

            $('#id_edit').val(item.id)
            $('#nama_desa').val(item.nama_desa)
            $('#no_telp').val(item.no_telp)
            $('#nama_lurah').val(item.nama_lurah)
            $('#alamat_desa').val(item.alamat_desa)

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

        $(document).on('click',".delete",function(e)
        {
            e.preventDefault()
            url = $(this).attr('href')
            Swal.fire({
                title: 'Hapus data tersebut ?',
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