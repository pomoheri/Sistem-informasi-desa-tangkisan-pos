@extends('layouts.backend.backend_bs5.main')

@section('title')
   User Management - Admin
@endsection

@section('ribbon')
    <div class="content-header">
        <h4 class="content-title">User Management</h4>
        <div class="content-breadcrumb ms-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
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
                                <h4 class="content-title mt-0 pt-0 text-muted">Data User</h4>
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
                                <button class="btn btn-sm btn-primary" onclick="tambahUser()"><i class="ri-add-box-fill"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="table-responsive">
                                    <table id="dt_basic" class="table table-sm table-striped table-bordered table-hover dataTable" aria-describedby="datatables_info" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">No</th>
                                                <th class="text-center align-middle">Name</th>
                                                <th class="text-center align-middle">Email</th>
                                                <th class="text-center align-middle">Password</th>
                                                <th class="text-center align-middle">Level Akses</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($user)
                                                @foreach ($user as $key => $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ Hash::make($item->password) }}</td>
                                                        <td>
                                                            @if($item->level_akses == '0')
                                                                Admin
                                                            @elseif($item->level_akses == '1')
                                                                Kades
                                                            @else
                                                                Warga
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-warning" data-item="{{ $item }}" onclick="editUser(this)"><i class="ri-edit-2-line"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
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

    <!-- Modal Add & Edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title updatePJP" id="exampleModalLabel"><strong>Data User</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formdetail" action="{{ route('admin.user-management.store') }}">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Hidden -->
                            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id_edit" id="id_edit" />
                            <!-- End Hidden -->
                            <div class="col-sm-6">
                                <label>name :</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                                @error('name')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                            <div class="col-sm-6">
                                <label>email :</label>
                                <input type="email" class="form-control" id="email" name="email" value="">
                                @error('email')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>password :</label>
                                <input class="form-control input-sm" type="password" name="password" id="password">
                                @error('password')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                            <div class="col-sm-6">
                                <label>level akses :</label>
                                <select class="form-select form-control input-sm" name="level_akses" id="level_akses">
                                    <option value="">Pilih</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Kades</option>
                                    <option value="2">Warga</option>
                                </select>
                                @error('level_akses')<label class="text-danger">{{$message}}</label>@enderror
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

        function tambahUser(){
            $('#id_edit').val('')
            $('#password').val('')
            $('#name').val('')
            $('#email').val('')
            $('#level_akses').val('')

            $('#modal-edit').modal('show')
        }

        function editUser(obj){
            var item = $(obj).data('item');
            console.log(item)
            $('#id_edit').val(item.id)
            $('#password').val(item.password)
            $('#name').val(item.name)
            $('#email').val(item.email)
            $('#level_akses').val(item.level_akses)

            $('#modal-edit').modal('show')
        }
    </script>
@endsection