@extends('layouts.backend.backend_bs5.main')

@section('title')
   Penduduk Pindah - Admin
@endsection

@section('ribbon')
    <div class="content-header">
        <h4 class="content-title">Penduduk Pindah</h4>
        <div class="content-breadcrumb ms-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penduduk Pindah</li>
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
                                <h4 class="content-title mt-0 pt-0 text-muted">Data Penduduk Pindah</h4>
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
                                <button class="btn btn-sm btn-primary" onclick="tambahPenduduk()"><i class="ri-add-box-fill"></i> Tambah</button>
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
                                                <th class="text-center align-middle">Tgl Keluar</th>
                                                <th class="text-center align-middle">Alamat Asal</th>
                                                <th class="text-center align-middle">Alamat Tujuan</th>
                                                <th class="text-center align-middle">Sebab Pindah</th>
                                                @if(Auth()->user()->level_akses == '0')
                                                <th class="text-center align-middle">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($list as $key => $item)
                                                <tr>
                                                    <td>{{ ($list->currentpage()-1) * $list->perpage() + $key + 1 }}</td>
                                                    <td>{{ ($item->penduduk) ? $item->penduduk->nama : '' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                                    <td>
                                                        RT {{ $item->rt_asal }}/
                                                        RW {{ $item->rw_asal }},
                                                        Kel. Tangkisan Pos,
                                                        Kec. Jogonalan
                                                    </td>
                                                    <td>
                                                        Desa {{ $item->desa_tujuan }},
                                                        Kec. {{ $item->kecamatan_tujuan }},
                                                        Kab. {{ $item->kabupaten_tujuan }}
                                                    </td>
                                                    <td>{{ $item->alasan_pindah }}</td>
                                                    @if(Auth()->user()->level_akses == '0')
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-warning" data-item="{{ $item }}" onclick="editPenduduk(this)"><i class="ri-edit-2-line"></i></button>
                                                        <a href="{{ route('admin.penduduk-pindah.delete',[$item]) }}" class="btn btn-sm btn-danger delete"><i class="ri-delete-bin-line"></i></a>
                                                        <a href="{{ route('admin.penduduk-pindah.generate-surat',[$item]) }}" class="btn btn-sm btn-primary"><i class="ri-mail-line"></i> Generate Surat</a>
                                                    </td>
                                                    @endif
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

    <!-- Modal Add & Edit -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Data Penduduk Pindah</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formdetail" action="{{ route('admin.penduduk-pindah.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="fw-bold">Data Pribadi</p>
                            </div>
                        </div>
                        <div class="row ps-4">
                            <!-- Hidden -->
                            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id_edit" id="id_edit" />
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
                            <div class="col-sm-6">
                                <label>Jenis Kelamin:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenkel" id="laki" value="L" disabled>
                                    <label class="form-check-label" for="flexRadioDefault1">Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>&emsp;</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenkel" id="perempuan" value="P" disabled>
                                    <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                                </div>
                                @error('jenkel')<label class="text-danger">{{$message}}</label>@enderror
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
                                <p class="fw-bold">Data Kepindahan</p>
                            </div>
                        </div>

                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>RT Asal :</label>
                                <select class="form-select form-control" name="rt_asal" id="rt_asal">
                                    <option value="">PILIH</option>
                                    <option value="001">001</option>
                                    <option value="002">002</option>
                                    <option value="003">003</option>
                                    <option value="004">004</option>
                                    <option value="005">005</option>
                                    <option value="006">006</option>
                                    <option value="007">007</option>
                                    <option value="008">008</option>
                                    <option value="009">009</option>
                                    <option value="010">010</option>
                                </select>
                                @error('rt_asal')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>RW Asal :</label>
                                <select class="form-select form-control" name="rw_asal" id="rw_asal">
                                    <option value="">PILIH</option>
                                    <option value="001">001</option>
                                    <option value="002">002</option>
                                    <option value="003">003</option>
                                    <option value="004">004</option>
                                    <option value="005">005</option>
                                    <option value="006">006</option>
                                    <option value="007">007</option>
                                    <option value="008">008</option>
                                    <option value="009">009</option>
                                    <option value="010">010</option>
                                </select>
                                @error('rw_asal')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Alasan Keluar/Pindah :</label>
                                <textarea class="form-control" name="alasan_pindah" id="alasan_pindah" cols="30" rows="10"></textarea>
                                @error('alasan_pindah')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <p class="fw-bold">Data Tujuan</p>
                            </div>
                        </div>

                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Desa Tujuan :</label>
                                <input class="form-control" type="text" name="desa_tujuan" id="desa_tujuan">
                                @error('desa_tujuan')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Kecamatan Tujuan :</label>
                                <input class="form-control" type="text" name="kecamatan_tujuan" id="kecamatan_tujuan">
                                @error('kecamatan_tujuan')<label class="text-danger">{{$message}}</label>@enderror
                            </div>
                        </div>
                        <div class="row ps-4">
                            <div class="col-sm-12">
                                <label>Kabupaten Tujuan :</label>
                                <input class="form-control" type="text" name="kabupaten_tujuan" id="kabupaten_tujuan">
                                @error('kabupaten_tujuan')<label class="text-danger">{{$message}}</label>@enderror
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

        function tambahPenduduk(){
            $('#id_edit').val('')
            $('#nik').val('')
            $('#nama').val('')
            $('#tempat_lahir').val('')
            $('#tgl_lahir').val('')
            $('#agama').val('')
            $('#jenkel').val('')
            $('#pendidikan').val('')
            $('#laki').attr('checked', false)
            $('#perempuan').attr('checked', false)
            $('#rt_asal').val('')
            $('#rw_asal').val('')
            $('#alasan_pindah').val('')
            $('#desa_tujuan').val('')
            $('#kecamatan_tujuan').val('')
            $('#kabupaten_tujuan').val('')

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
                if(item.penduduk.jenkel == 'L'){
                    $('#laki').attr('checked', true)
                }else{
                    $('#perempuan').attr('checked', true)
                }
                $('#pendidikan').val(item.penduduk.pendidikan)
            }
            $('#rt_asal').val(item.rt_asal)
            $('#rw_asal').val(item.rw_asal)
            $('#alasan_pindah').val(item.alasan_pindah)
            $('#desa_tujuan').val(item.desa_tujuan)
            $('#kecamatan_tujuan').val(item.kecamatan_tujuan)
            $('#kabupaten_tujuan').val(item.kabupaten_tujuan)

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
                        if(xhr.data.jenkel == 'L')
                            $('#laki').attr('checked', true)
                        else
                            $('#perempuan').attr('checked', true)
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
                $('#laki').attr('checked', false)
                $('#perempuan').attr('checked', false)
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