<div>
    <img src="{{url('assets/Header-17.jpg')}}" style="background-size: cover;position: relative; z-index: 905;" height="100%" width="100%">
</div>
<div id="header" style="background: linear-gradient(to right, #30376b, #4cadfe);">
    <div id="logo-group">
        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo">
            <img src="{{url('assets/logo-05.png')}}" alt="E-RKAB" style="float: left;width: 45px; margin-top: -11px;">
            <h1 style="color: white;margin: 0px;"><strong>e-RKAB</strong></h1>
        </span>

        <!-- END LOGO PLACEHOLDER -->
    </div>

    <div class="pull-left">
        <span><a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"> <img src="{{url('assets/list-menu-10.png')}}" height="35px" widht="35px"> </a></span>
        <span id="logo" style="width: 700px">
        @if(Auth::user()->id_perusahaan == 0)
                <h5 style="color: white;margin: 0px;"><strong>{{Auth::user()->name}}</strong></h5>
            @else
                <h5 style="color: white;margin: 0px;"><strong>{{getNamaPerusahaan()}}</strong></h5>
            @endif
        </span>
    </div>

    <!-- #TOGGLE LAYOUT BUTTONS -->
    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
            <!-- <div id="hide-menu" class="btn-header pull-right">
                <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
            </div> -->
        <!-- end collapse menu -->

        <!-- #MOBILE -->
        <!-- Top menu profile link : this shows only when top menu is active -->
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- logout button -->
        <div id="logout" class="transparent pull-right">
            @php
                $grup_menu = getGrupMenu(Auth::user()->grup_akses);
            @endphp
            @if($grup_menu != 0)
                @if($grup_menu == 1 || $grup_menu == 2 || $grup_menu == 3 || $grup_menu == 4 || $grup_menu == 5 || $grup_menu == 6 || $grup_menu == 7)
                    <span>
                        <a href="{{route('subdit.ubah.password')}}"><img src="{{url('assets/ganti-password.png')}}" title="Ubah Password" height="35px" widht="35px" style="margin-top:7px;"></a>
                    <span>
                @else
                    <span>
                        <a href="{{route('su.ubah.password')}}"><img src="{{url('assets/ganti-password.png')}}" title="Ubah Password" height="35px" widht="35px" style="margin-top:7px;"></a>
                    <span>
                @endif
            @endif            
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" title="Sign Out"><img src="{{url('assets/logout-12.png')}}" style="margin-top: 10px;" height="35px" widht="35px"></a>
            </span>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <!-- end logout button -->

        <!-- notif -->

        <div class="dropdown" style="float: right; padding: 12px">
            <a role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="uldropdown" style="float: left;" aria-expanded="true">
                <!-- <i class="fa fa-bell-o" style="font-size: 20px; float: left; color: black">
                </i> -->
                <img src="{{url('assets/notif-11.png')}}" height="35px" widht="35px">
            </a>
            <span class="badge badge-danger notif-count" id="notif-count">{{countNotifications(Auth::user()->id)}}</span>
            <ul style="width: 400px;" id="uldropdown" class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation">
                    <a href="#" class="dropdown-menu-header">Notifikasi</a>
                </li>
                <ul class="timeline timeline-icons timeline-sm timeline-list" style="margin:10px;height:200px;overflow-y:scroll;">
                    @php $notifikasi = DataNotifications(Auth::user()->id); @endphp
                    @foreach($notifikasi as $notif)
                    <li>
                        <p>
                            {{-- Untuk sementara click here di lonceng karena ada kesalahan query di dalamnya --}}
                            {{$notif->title}} {{-- <a onclick="markAsRead('{{$notif->id}}')" href="{{$notif->notif_details}}">click here</a> --}}
                            <span class="timeline-icon"><i class="fa @if($notif->role_from=='Perusahaan') fa-building @else fa-user @endif" style="color:green"></i></span>
                            <span class="timeline-date">{{ $notif->created_at}}</span>
                        </p>
                    </li>
                    @endforeach
                    
                </ul>
                <li role="presentation">
                    <a href="#" class="dropdown-menu-header"></a>
                </li>
            </ul>
        </div>

        <!-- end notif -->

    </div>
    <!-- end pulled right: nav area -->
</div>
<!-- END HEADER -->

