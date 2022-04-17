<x-header title="Welcome {{session('name')}}" />
@extends('layout.main')
@section('main-section')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{url('/frontend')}}/images/logo.png" alt="BDS Logo" height="60" width="60">
        </div>
        @include('layout.nav')
        @php
        $button=[
        [
        'link'=>"/",
        'icon'=>"fa-brands fa-wpforms",
        'text'=>"Register Donner",
        'onclick'=>""
        ],
        [
        'link'=>"/report",
        'icon'=>"fa-solid fa-chart-line",
        'text'=>"Repeorts",
        'onclick'=>""
        ],
        [
        'link'=>"/case",
        'icon'=>"fa-solid fa-square-plus",
        'text'=>"Regester New Case",
        'onclick'=>""
        ],
        [
        'link'=>"/case-all",
        'icon'=>"fa-solid fa-book",
        'text'=>"Case Book",
        'onclick'=>""
        ], 
        [
        'link'=>"/logout",
        'icon'=>"fa-solid fa-arrow-right-from-bracket",
        'text'=>"Logout",
        'onclick'=>""
        ]
        ]
        @endphp
        <x-sidebar :button="$button" />
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Search Blood </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Enter Blood Group</h3>
                                </div>

                                {!! Form::open(['route'=>'get_donner','method'=>'GET']) !!}
                                <div class="card-body">
                                    <div class="form-group">
                                        {!! Form::label('Blood Group') !!}
                                        {!! Form::select('group',
                                        ['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'],"A+",['required','class'=>"custom-select
                                        rounded-0"]) !!}
                                    </div>
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off custom-switch-on-danger">
                                            <input type="checkbox" name="eligible" class="custom-control-input"
                                                id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Only donner who can
                                                donate</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    {!! Form::submit('Submit', ['class'=>"btn btn-danger"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>