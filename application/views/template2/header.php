<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HR BUMA | </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/css/bootstrap.min.css">
    <link href="<?= base_url('assets') ?>/plugins/fontawesome/css/all.min.css">
    <link href="<?= base_url('assets') ?>/plugins/fontawesome/css/fontawesome.min.css">
    <link href="<?= base_url('assets') ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/twitter-bootstrap-wizard/form-wizard.css">

</head>

<body>
    <div class="main-wrapper">
        <div class="header-outer">
            <div class="header">
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
                <a id="toggle_btn" class="float-left" href="javascript:void(0);">
                    <img src="<?= base_url('assets') ?>/img/sidebar/icon-21.png" alt="">
                </a>
                <ul class="nav float-left">
                    <li>
                        <a href="{{ route('home') }}" class="mobile-logo d-md-block d-lg-none d-block"><img src="<?= base_url('assets') ?>/img/logo.png" alt="" width="30" height="30"></a>
                    </li>
                </ul>
                <ul class="nav user-menu float-right">
                    <li class="nav-item dropdown has-arrow">
                        <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                            <span class="user-img"><img class="rounded-circle" src="<?= base_url('assets') ?>/img/user-06.jpg" width="30" alt="Admin">
                                <span class="status online"></span></span>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mobile-user-menu float-right">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <div class="header-left">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="<?= base_url('assets') ?>/img/logo.png" width="150" height="50" alt="">
                        </a>
                    </div>
                    <ul class="sidebar-ul">
                        <li class="menu-title">Menu</li>
                        <li class="{{ (request()->is('home*')) ? 'active' : '' }}"><a href="{{ route('home') }}"><img src="<?= base_url('assets') ?>/img/sidebar/icon-1.png" alt="icon"><span>Dashboard</span></a></li>
                        @if(Auth::user()->role_id == 1)
                        <li class="{{ (request()->is('karyawan*')) ? 'active' : '' }}"><a href="{{ route('karyawan.index') }}"><img src="{{ asset('assets/img/sidebar/icon-10.png') }}" alt="icon"><span>Karyawan</span></a></li>
                        <li class="{{ (request()->is('asesor*')) ? 'active' : '' }}"><a href="{{ route('asesor.index') }}"><img src="{{ asset('assets/img/sidebar/icon-10.png') }}" alt="icon"><span>Asesor</span></a></li>
                        <li class="{{ (request()->is('training*')) ? 'active' : '' }}"><a href="{{ route('training.index') }}"><img src="{{ asset('assets/img/sidebar/icon-5.png') }}" alt="icon"><span>Training</span></a></li>
                        <li class="{{ (request()->is('suggestionSystem*')) ? 'active' : '' }}"><a href="{{ route('suggestionSystem.index') }}"><img src="{{ asset('assets/img/sidebar/icon-19.png') }}" alt="icon"><span>Suggestion System</span></a></li>
                        <li class="{{ (request()->is('continuesImprovement*')) ? 'active' : '' }}"><a href="{{ route('continuesImprovement.index') }}"><img src="{{ asset('assets/img/sidebar/icon-19.png') }}" alt="icon"><span>Cont. Improvement</span></a></li>
                        <li class="{{ (request()->is('kompetensi*')) ? 'active' : '' }}"><a href="{{ route('kompetensi.index') }}"><img src="{{ asset('assets/img/sidebar/icon-12.png') }}" alt="icon"><span>Kompetensi</span></a></li>
                        <li class="{{ (request()->is('assessment*')) ? 'active' : '' }}"><a href="{{ route('assessment.index') }}"><img src="{{ asset('assets/img/sidebar/icon-12.png') }}" alt="icon"><span>Assessment</span></a></li>
                        <li class="submenu">
                            <a href="#"><img src="{{ asset('assets/img/sidebar/icon-26.png') }}" alt="icon"> <span> Data Master</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li class="{{ (request()->is('department*')) ? 'active' : '' }}"><a href="{{ route('department.index') }}"><span>Department</span></a></li>
                                <li class="{{ (request()->is('section*')) ? 'active' : '' }}"><a href="{{ route('section.index') }}"><span>Section</span></a></li>
                                <li class="{{ (request()->is('jabatan*')) ? 'active' : '' }}"><a href="{{ route('jabatan.index') }}"><span>Jabatan</span></a></li>
                                <li class="{{ (request()->is('jenisKompetensi*')) ? 'active' : '' }}"><a href="{{ route('jenisKompetensi.index') }}"><span>Jenis Kompetensi</span></a></li>
                                <li class="{{ (request()->is('userManage*')) ? 'active' : '' }}"><a href="{{ route('userManage.index') }}"><span>Manage User</span></a></li>
                            </ul>
                        </li>
                        @elseif(Auth::user()->role_id == 3)
                        <li class="{{ (request()->is('list-karyawan*')) ? 'active' : '' }}"><a href="{{ route('list-karyawan.index') }}"><img src="{{ asset('assets/img/sidebar/icon-10.png') }}" alt="icon"><span>Karyawan</span></a></li>
                        <li class="{{ (request()->is('list-kompetensi*')) ? 'active' : '' }}"><a href="{{ route('list-kompetensi.index') }}"><img src="{{ asset('assets/img/sidebar/icon-12.png') }}" alt="icon"><span>Kompetensi</span></a></li>
                        <li class="{{ (request()->is('list-assessment*')) ? 'active' : '' }}"><a href="{{ route('list-assessment.index') }}"><img src="{{ asset('assets/img/sidebar/icon-12.png') }}" alt="icon"><span>Assessment</span></a></li>
                        @elseif(Auth::user()->role_id == 2)
                        <li class="{{ (request()->is('karyawanTraining*')) ? 'active' : '' }}"><a href="{{ route('karyawanTraining.index') }}"><img src="{{ asset('assets/img/sidebar/icon-5.png') }}" alt="icon"><span>Training</span></a></li>
                        <li class="{{ (request()->is('karyawanAssessment*')) ? 'active' : '' }}"><a href="{{ route('karyawanAssessment.index') }}"><img src="{{ asset('assets/img/sidebar/icon-5.png') }}" alt="icon"><span>Assesment</span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>