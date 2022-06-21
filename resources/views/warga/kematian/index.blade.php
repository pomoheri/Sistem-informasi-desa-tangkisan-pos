@extends('layouts.backend.backend_bs5.main')

@section('title')
   Kematian - Warga
@endsection

@section('ribbon')
    <div class="content-header">
        <h4 class="content-title">Kematian</h4>
        <div class="content-breadcrumb ms-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan Surat Kematian</li>
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
                                <h4 class="content-title mt-0 pt-0 text-muted">Data Permohonan Surat Kematian</h4>
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
                                <button class="btn btn-sm btn-primary" onclick="tambahPermohonan()"><i class="ri-add-box-fill"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="table-responsive">
                                    <table id="dt_basic" class="table table-sm table-striped table-bordered table-hover dataTable" aria-describedby="datatables_info" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">No</th>
                                                <th class="text-center align-middle">Nama</th>
                                                <th class="text-center align-middle">Alamat</th>
                                                <th class="text-center align-middle">Tgl Meninggal</th>
                                                <th class="text-center align-middle">Tempat Meninggal</th>
                                                <th class="text-center align-middle">Sebab Meninggal</th>
                                                <th class="text-center align-middle">Pelapor</th>
                                                <th class="text-center align-middle">Hubungan Pelapor</th>
                                                <th class="text-center align-middle">Status Surat</th>
                                                <th class="text-center align-middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($list as $key => $item)
                                                <tr>
                                                    <td>{{ ($list->currentpage()-1) * $list->perpage() + $key + 1 }}</td>
                                                    <td>{{ ($item->penduduk) ? $item->penduduk->nama : '' }}</td>
                                                    <td>{{ ($item->penduduk) ? $item->penduduk->alamat : '' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_meninggal)->format('d/m/Y')}}</td>
                                                    <td>{{ $item->tempat_kematian }}</td>
                                                    <td>{{ $item->sebab }}</td>
                                                    <td>{{ $item->pelapor }}</td>
                                                    <td>{{ $item->hubungan_pelapor }}</td>
                                                    <td>{{ ($item->surat_kematian) ? 'Surat Telah Selesai Dibuat' : 'Proses Permohonan' }}</td>
                                                    <td class="text-center">
                                                        @if($item->surat_kematian)
                                                            <a title="Surat-Kematian" download="Surat-Kematian" href="{{ Storage::url($item->surat_kematian) }}" class="btn btn-sm btn-success"><i class="ri-mail-download-fill"></i> Donwload Surat</a>
                                                        @else
                                                            <button class="btn btn-sm btn-warning" data-item="{{ $item }}" onclick="editPenduduk(this)"><i class="ri-edit-2-line"></i></button>
                                                            <a href="{{ route('warga.kematian.delete',[$item]) }}" class="btn btn-sm btn-danger delete"><i class="ri-delete-bin-line"></i></a>
                                                        @endif
                                                    </td>
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

    <!-- Modal Add and Edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Data Permohonan Bayi</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formdetail" action="{{ route('warga.kematian.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="fw-bold">Data Kematian Penduduk</p>
                            </div>
                        </div>
                        <div class="row ps-4">
                            <!-- Hidden -->
                            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id_edit" id="id_edit" />
                            <input type="hidden" name="alamat" id="alamat" />
                            <!-- End Hidden -->
                            <div class="col-sm-12">
                                <label>NIK :</label>
                                <input type="text" class="form-control input-sm" id="nik" name="nik" value="">
                                @error('nik')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Nama :</label>
                                <input type="text" class="form-control input-sm" id="nama" name="nama" value="" readonly>
                                @error('nama')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Tempat Lahir :</label>
                                <input class="form-control input-sm" type="text" name="tempat_lahir" id="tempat_lahir" readonly>
                                @error('tempat_lahir')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Tgl Lahir :</label>
                                <input class="form-control input-sm" type="date" name="tgl_lahir" id="tgl_lahir" readonly>
                                @error('tgl_lahir')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Agama :</label>
                                <select class="form-select form-contol" name="agama" id="agama" disabled>
                                    <option value="">PILIH</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error('agama')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Pendidikan Terakhir :</label>
                                <select class="form-select form-contol" name="pendidikan" id="pendidikan" disabled>
                                    <option value="">PILIH</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @error('pendidikan')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <p class="fw-bold">Data Kematian</p>
                            </div>
                        </div>

                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Tgl Meninggal :</label>
                                <input type="date" class="form-control input-sm" id="tgl_meninggal" name="tgl_meninggal" value="">
                                @error('tgl_meninggal')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Tempat Meninggal :</label>
                                <input type="text" class="form-control input-sm" id="tempat_meninggal" name="tempat_meninggal" value="">
                                @error('tempat_meninggal')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Penyebab Kematian :</label>
                                <textarea class="form-control" name="penyebab" id="penyebab" cols="30" rows="10"></textarea>
                                @error('penyebab')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <p class="fw-bold">Data Pelapor</p>
                            </div>
                        </div>

                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Nama Pelapor :</label>
                                <input type="text" class="form-control input-sm" id="nama_pelapor" name="nama_pelapor" value="">
                                @error('nama_pelapor')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Hubungan Pelapor :</label>
                                <input type="text" class="form-control input-sm" id="hubungan" name="hubungan" value="">
                                @error('hubungan')<label class="text-danger">{{$message}}</label>@enderror
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

        function tambahPermohonan(){
            $('#id_edit').val('')
            $('#nik').val('')
            $('#nama').val('')
            $('#tempat_lahir').val('')
            $('#tgl_lahir').val('')
            $('#agama').val('')
            $('#pendidikan').val('')
            $('#tgl_meninggal').val('')
            $('#tempat_meninggal').val('')
            $('#penyebab').val('')
            $('#nama_pelapor').val('')
            $('#hubungan').val('')

            $('#modal-edit').modal('show')
        }

        function editPenduduk(obj){
            var item = $(obj).data('item');
            console.log(item)
            $('#id_edit').val(item.id)
            if(item.penduduk){
                $('#nik').val(item.penduduk.nik)
                $('#nama').val(item.penduduk.nama)
                $('#tempat_lahir').val(item.penduduk.tempat_lahir)
                $('#tgl_lahir').val(item.penduduk.tgl_lahir)
                $('#agama').val(item.penduduk.agama)
                $('#pendidikan').val(item.penduduk.pendidikan)
            }else{
                $('#nik').val('')
                $('#nama').val('')
                $('#tempat_lahir').val('')
                $('#tgl_lahir').val('')
                $('#agama').val('')
                $('#pendidikan').val('')
            }
            $('#tgl_meninggal').val(item.tgl_meninggal)
            $('#tempat_meninggal').val(item.tempat_kematian)
            $('#penyebab').val(item.sebab)
            $('#nama_pelapor').val(item.pelapor)
            $('#hubungan').val(item.hubungan_pelapor)

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

        $('#nik').on('change',function(e){
            event.preventDefault();
            var data = $(this).val()
            if(data != ''){
                $.ajax({
                    url : "{{ url('admin/penduduk-pindah/getPenduduk') }}/"+data,
                    type : "GET",
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Moho Tunggu !',
                            html: 'Sedang Mencari Data',
                            allowOutsideClick: false,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            },
                        });
                    },
                    complete: function(){
                        swal.close();
                    }
                }).then(function(xhr){
                    option = ``
                    if(xhr.status){
                        $('#nama').val(xhr.data.nama)
                        $('#tempat_lahir').val(xhr.data.tempat_lahir)
                        $('#tgl_lahir').val(xhr.data.tgl_lahir)
                        $('#agama').val(xhr.data.agama)
                        $('#pendidikan').val(xhr.data.pendidikan)
                    }else{
                        Swal.fire({
                            title: 'Data Tidak Ditemukan !',
                            allowOutsideClick: false,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            },
                        });
                    }
                })
            }else{
                $('#nama').val('')
                $('#tempat_lahir').val('')
                $('#tgl_lahir').val('')
                $('#agama').val('')
                $('#jenkel').val('')
                $('#pendidikan').val('')
            }

        })

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