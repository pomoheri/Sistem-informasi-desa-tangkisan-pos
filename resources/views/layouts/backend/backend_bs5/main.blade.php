<!doctype html>
<html lang="id">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon"  type="image/x-icon" href="{{ asset('assets_bs5/img/favicon.ico') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets_bs5/img/favicon.ico') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
        <link rel="stylesheet" href="{{ asset('assets_bs5/fonts/remixicon/fonts/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_bs5/vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_bs5/css/theme.css?v=').time() }}">
        @yield('css')
        @stack('style')
    </head>
    <body>
        @include('layouts.backend.backend_bs5.header') {{-- Header --}}
        @include('layouts.backend.backend_bs5.sidebar') {{-- Sidebar --}}
        <main class="main-content">
            @yield('ribbon')
            @yield('content')            
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-md-start">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end">
                                {{ date('Y') }} © My Skripsi 
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('assets_bs5/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets_bs5/vendor/@popperjs/popper.min.js') }}"></script>
        <script src="{{ asset('assets_bs5/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets_bs5/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets_bs5/vendor/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('assets_bs5/vendor/inputmask/bindings/inputmask.binding.js') }}"></script>
        <script src="{{ asset('assets_bs5/js/theme.js?v=').time() }}"></script>
        <script type="text/javascript">
            baseurl = "{{ url('/') }}"
        </script>
        @yield('js')
        @stack('scripts')
    </body>
</html>