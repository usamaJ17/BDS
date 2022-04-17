@php
$script='<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://pagination.js.org/dist/2.1.5/pagination.min.js"></script>
<link rel="stylesheet" href="http://pagination.js.org/dist/2.1.5/pagination.css" />
'
@endphp
<x-header title="Welcome {{session('name')}} " :script="$script" />

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
        <x-sidebar :button="$button" />
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">All Cases Details</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Expandable Cases</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 15.625rem;">
                                            <input type="text" name="name" class="form-control float-right"
                                                id="search-box" placeholder="Search By Case ID">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Case #</th>
                                                <th>Blood Group</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="t-data">
                                            {{-- TABLE DATA FROM JS SCRIPT --}}
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div id="t-pag">
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
                    <i class="fas fa-exclamation-circle" style="font-size: 1.8rem; padding-top: 4px;"></i> &nbsp &nbsp
                    <h4 class="modal-title">Donner Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 id='modal-text'></h4>
                </div>
            </div>
        </div>
        <!--LOGIN ENDS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        {{-- login error popup --}}

        <script>
            function show_popup(show=0,donner){
            $(document).ready(function(){
                var showModel=show;
                if(showModel==`1`){
                     $('#modal-text').html(donner);
                    $(`#modal-default-admin`).modal(`show`);
                }
            });
        }
        var users =<?php echo $array; ?>;
        $('#t-pag').pagination({
            dataSource: users,
            pageSize: 7,
            showGoInput: true,
            showGoButton: true,
            callback: function(data, pagination) {
                var dataHtml = '';
                $.each(data, function (index, user) {
                    if(user['donner'][0]!=null){
                        var donnerInfo=`<table class="table table-bordered"><thead><tr><th >Name</th><td>`+user['donner'][0].name+`</td></tr></thead><tbody><tr><th>Reg #</th><td>`+user['donner'][0].reg_num+`</td></tr><tr><th>Phone</th><td>`+user['donner'][0].phone+`</td></tr><tr><th>Location</th><td>`+user['donner'][0].location+`</td></tr></tbody></table>`;
                        dataHtml += "<tr data-widget='expandable-table' aria-expanded='false'><td>"+user['number']+"</td><td>"+user['patient_blood']+"</td><td>"+user['location']+"</td><td>"+user['created_at']+"</td></tr><tr class='expandable-body d-none'><td colspan='5'><p style='display: none;'>Patient Name : "+user['patient_name']+"<br>Patient Blood : "+user['patient_blood']+"<br>Loaction : "+user['location']+"<br>Patient Age : "+user['age']+"<br>Attendent Name : "+user['attendent_name']+"<br>Attendent Contact : "+user['attendent_contact']+"<br>Attendent Blood Group : "+user['attendent_blood']+"<br>Arranged By : "+user['arranged_by']+"<br>Donner ID (if donated) : "+user['donner_id']+"<code onclick='show_popup(1,`"+donnerInfo+"`)'> Donner details</code> </p></td></tr>"; 
                    }
                    else{
                        dataHtml += "<tr data-widget='expandable-table' aria-expanded='false'><td>"+user['number']+"</td><td>"+user['patient_blood']+"</td><td>"+user['location']+"</td><td>"+user['created_at']+"</td></tr><tr class='expandable-body d-none'><td colspan='5'><p style='display: none;'>Patient Name : "+user['patient_name']+"<br>Patient Blood : "+user['patient_blood']+"<br>Loaction : "+user['location']+"<br>Patient Age : "+user['age']+"<br>Attendent Name : "+user['attendent_name']+"<br>Attendent Contact : "+user['attendent_contact']+"<br>Attendent Blood Group : "+user['attendent_blood']+"<br>Arranged By : "+user['arranged_by']+"</p></td></tr>"; 
                    }
                });
                $("#t-data").html(dataHtml);
            }
        });
        var key="";
        $('#search-box').keydown(function (e) {
            if( (e.keyCode>=48 && e.keyCode<=57) || (e.keyCode==8) ){
                if(e.keyCode==8){
                    key=key.slice(0,-1)
                }
                else{
                    key=key+e.key;
                }
                var dataHtml = '';
                users.forEach(function(user){
                    if(key==""){
                        if(user['donner'][0]!=null){
                        var donnerInfo=`<table class="table table-bordered"><thead><tr><th >Name</th><td>`+user['donner'][0].name+`</td></tr></thead><tbody><tr><th>Reg #</th><td>`+user['donner'][0].reg_num+`</td></tr><tr><th>Phone</th><td>`+user['donner'][0].phone+`</td></tr><tr><th>Location</th><td>`+user['donner'][0].location+`</td></tr></tbody></table>`;
                        dataHtml += "<tr data-widget='expandable-table' aria-expanded='false'><td>"+user['number']+"</td><td>"+user['patient_blood']+"</td><td>"+user['location']+"</td><td>"+user['created_at']+"</td></tr><tr class='expandable-body d-none'><td colspan='5'><p style='display: none;'>Patient Name : "+user['patient_name']+"<br>Patient Blood : "+user['patient_blood']+"<br>Loaction : "+user['location']+"<br>Patient Age : "+user['age']+"<br>Attendent Name : "+user['attendent_name']+"<br>Attendent Contact : "+user['attendent_contact']+"<br>Attendent Blood Group : "+user['attendent_blood']+"<br>Arranged By : "+user['arranged_by']+"<br>Donner ID (if donated) : "+user['donner_id']+"<code onclick='show_popup(1,`"+donnerInfo+"`)'> Donner details</code> </p></td></tr>"; 
                        }
                        else{
                            dataHtml += "<tr data-widget='expandable-table' aria-expanded='false'><td>"+user['number']+"</td><td>"+user['patient_blood']+"</td><td>"+user['location']+"</td><td>"+user['created_at']+"</td></tr><tr class='expandable-body d-none'><td colspan='5'><p style='display: none;'>Patient Name : "+user['patient_name']+"<br>Patient Blood : "+user['patient_blood']+"<br>Loaction : "+user['location']+"<br>Patient Age : "+user['age']+"<br>Attendent Name : "+user['attendent_name']+"<br>Attendent Contact : "+user['attendent_contact']+"<br>Attendent Blood Group : "+user['attendent_blood']+"<br>Arranged By : "+user['arranged_by']+"</p></td></tr>"; 
                        }
                    }
                    else if(user['number']==key){
                        if(user['donner'][0]!=null){
                            var donnerInfo=`<table class="table table-bordered"><thead><tr><th >Name</th><td>`+user['donner'][0].name+`</td></tr></thead><tbody><tr><th>Reg #</th><td>`+user['donner'][0].reg_num+`</td></tr><tr><th>Phone</th><td>`+user['donner'][0].phone+`</td></tr><tr><th>Location</th><td>`+user['donner'][0].location+`</td></tr></tbody></table>`;
                        dataHtml += "<tr data-widget='expandable-table' aria-expanded='false'><td>"+user['number']+"</td><td>"+user['patient_blood']+"</td><td>"+user['location']+"</td><td>"+user['created_at']+"</td></tr><tr class='expandable-body d-none'><td colspan='5'><p style='display: none;'>Patient Name : "+user['patient_name']+"<br>Patient Blood : "+user['patient_blood']+"<br>Loaction : "+user['location']+"<br>Patient Age : "+user['age']+"<br>Attendent Name : "+user['attendent_name']+"<br>Attendent Contact : "+user['attendent_contact']+"<br>Attendent Blood Group : "+user['attendent_blood']+"<br>Arranged By : "+user['arranged_by']+"<br>Donner ID (if donated) : "+user['donner_id']+"<code onclick='show_popup(1,`"+donnerInfo+"`)'> Donner details</code> </p></td></tr>"; 
                        }
                        else{
                            dataHtml += "<tr data-widget='expandable-table' aria-expanded='false'><td>"+user['number']+"</td><td>"+user['patient_blood']+"</td><td>"+user['location']+"</td><td>"+user['created_at']+"</td></tr><tr class='expandable-body d-none'><td colspan='5'><p style='display: none;'>Patient Name : "+user['patient_name']+"<br>Patient Blood : "+user['patient_blood']+"<br>Loaction : "+user['location']+"<br>Patient Age : "+user['age']+"<br>Attendent Name : "+user['attendent_name']+"<br>Attendent Contact : "+user['attendent_contact']+"<br>Attendent Blood Group : "+user['attendent_blood']+"<br>Arranged By : "+user['arranged_by']+"</p></td></tr>"; 
                        }
                    }
                });
                $("#t-data").html(dataHtml);
            }
        });
        </script>