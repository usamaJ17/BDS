<x-header title="{{$title}}" />
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
        'text'=>"Register New",
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
        <x-sidebar  :button="$button" />
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Donner Updation Form</h1>
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
                                    <h3 class="card-title">Update Info</h3>
                                </div>
                                {!! Form::open(['route' => [$route, $donner->donner_id],'method' => 'put' ]) !!}
                                <div class="card-body">
                                    <div class="form-group">
                                        {!! Form::label('Name') !!}
                                        {!! Form::text('name',$donner->name, ['required','class'=>"form-control",'placeholder'=>"Enter Name"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Regestration Number') !!}
                                        {!! Form::text('reg_num',$donner->reg_num,
                                        ['required', 'class'=>"form-control",'placeholder'=>"2020-CS-665"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Email') !!}
                                        {!! Form::email("email",$donner->email, ['class'=>"form-control",'placeholder'=>"email"])
                                        !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Phone') !!}
                                        {!! Form::text('phone',$donner->phone, ['required', 'class'=>"form-control",'placeholder'=>"03xxxxxxxxx"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Blood Group') !!}
                                        {!! Form::select("group", ['A+','A-','B+','B-','AB+','AB-','O+','O-'],$donner->group,['required','class'=>"custom-select rounded-0"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Location (Day scholar type current living location & Hostelies mention their city)') !!}
                                        {!! Form::text('location', $donner->location, ['class'=>"form-control",'placeholder'=>"Area Location"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('How many times you have donated blood?') !!}
                                        {!! Form::text('history', $donner->history, ['class'=>"form-control",'placeholder'=>"Your answer"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Recent Date of Blood Donated') !!}
                                        {!! Form::date('date',$donner->date, ['class'=>"form-control"]) !!}
                                    </div>
                                    <br>
                                    <h5>Choose your Committee:(You want to join)</h5><br>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','blood management',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio1']) !!}
                                            {!! Form::label('radio1', "Blood Management", ['class'=>"custom-control-label"]) !!}
                                        </div>
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','event',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio2']) !!}
                                            {!! Form::label('radio2', "Event Management", ['class'=>"custom-control-label"]) !!}
                                        </div>
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','graphics',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio3']) !!}
                                            {!! Form::label('radio3', "Graphics", ['class'=>"custom-control-label"]) !!}
                                        </div>
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','media',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio4']) !!}
                                            {!! Form::label('radio4', "Media", ['class'=>"custom-control-label"]) !!}
                                        </div>
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','hr',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio5']) !!}
                                            {!! Form::label('radio5', "Human Resources", ['class'=>"custom-control-label"]) !!}
                                        </div>
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','decor',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio6']) !!}
                                            {!! Form::label('radio6', "Decor", ['class'=>"custom-control-label"]) !!}
                                        </div>
                                        <div class="custom-control custom-radio">
                                            {!! Form::radio('team','sponsership',"", ['class'=>"custom-control-input custom-control-input-danger custom-control-input-outline",'id'=>'radio7']) !!}
                                            {!! Form::label('radio7', "Sponsership", ['class'=>"custom-control-label"]) !!}
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
        <!-- LOGIN -->
        <div class="modal fade " id="modal-default-admin" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content ">
                <div class="modal-header">
                  <i class="fas fa-exclamation-circle" style="font-size: 1.8rem; padding-top: 4px;"></i> &nbsp &nbsp<h4 class="modal-title">Admin Login</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputText1">User Name <code></code> </label>
                        <input type="text" required class="form-control" placeholder="Enter Admin Name" name="name">
                      </div>
                      <!-- REG NUMBER -->
                      <div class="form-group">
                        <label for="exampleInputText">Password <code></code></label>
                        <input type="password" required class="form-control" placeholder="password" name="password">
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="submit" class="btn btn-block btn-outline-secondary">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--LOGIN ENDS-->
     <!-- BOOTSTRAP SCRIPTS FOR POPUP -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     