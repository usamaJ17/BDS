<x-header title="BDS UET KSK" />
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
        'link'=>"/dashboard",
        'icon'=>"fa-solid fa-droplet",
        'text'=>"Search Blood",
        'onclick'=>""
        ],
        [
        'link'=>"/report",
        'icon'=>"fa-solid fa-chart-line",
        'text'=>"Repeorts",
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
        ];
        @endphp
        <x-sidebar  :button="$button" />
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Enter Case Details</h1>
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
                                    <h3 class="card-title">Enter Info</h3>
                                </div>
                                {!! Form::open(['route'=>'submit_case']) !!}
                                <div class="card-body">
                                    <div class="form-group">
                                        {!! Form::label('Patient Name') !!}
                                        {!! Form::text('patient_name',"", ['class'=>"form-control",'placeholder'=>"Enter Patient Name"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Patient Blood Group') !!}
                                        {!! Form::select("patient_blood", ['A+','A-','B+','B-','AB+','AB-','O+','O-'],"",['required','class'=>"custom-select rounded-0"]) !!}
                                        <code>
                                            @error('patient_blood')
                                                {{$message}}
                                            @enderror
                                        </code>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Location') !!}
                                        {!! Form::text('location',"",['required', 'class'=>"form-control",'placeholder'=>"hospital name"]) !!}
                                        <code>
                                            @error('location')
                                                {{$message}}
                                            @enderror
                                        </code>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Age') !!}
                                        {!! Form::number('age', "", ['class'=>"form-control",'placeholder'=>"age"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Attendent Name') !!}
                                        {!! Form::text('attendent_name',"", [ 'class'=>"form-control",'placeholder'=>"name"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Attendent Contact') !!}
                                        {!! Form::text('attendent_contact',"", ['required','class'=>"form-control",'placeholder'=>"03xxxxxxxxx"]) !!}
                                        <code>
                                            @error('attendent_contact')
                                                {{$message}}
                                            @enderror
                                        </code>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Attedent Blood Group') !!}
                                        {!! Form::select("attendent_blood", ['A+','A-','B+','B-','AB+','AB-','O+','O-',''],"",['class'=>"custom-select rounded-0"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Arranged By') !!}
                                        {!! Form::select("arranged_by", ['attendent','BDS',""],"",['class'=>"custom-select rounded-0"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Donner ID (if from BDS)') !!}
                                        {!! Form::number('donner_id', "", ['class'=>"form-control",'placeholder'=>"donner ID"]) !!}
                                        <code>
                                            @error('donner_id')
                                                {{$message}}
                                            @enderror
                                        </code>
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
   