@extends('layouts.backend.backend_bs5.main')

@section('ribbon')
    <div class="content-header">
        <h4 class="content-title"></h4>
        <div class="content-breadcrumb ms-auto">
            <ol class="breadcrumb">
               
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
                            <div class="col-12">
                                <h3 class="text-center">SELAMAT DATANG</h3>
                                <h3 class="text-center">{{ strtoupper(auth()->user()->name) }}</h3>
                                <h3 class="text-center">SISTEM INFORMASI DESA TANGKISAN POS</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
