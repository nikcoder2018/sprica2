<?php 
use App\Helpers\Language;
$lang = new Language;
?>
@extends('layouts.admin.main')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link href="{{asset('dist/css/validation_master.css')}}" rel="stylesheet">
    <style>
        .dataTables_length, .dataTables_filter, .dataTables_iinfo, .ddataTables_paginate {
            display: none;
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }
        .card-header {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1);
            transition: 0.3s;
            border-radius: 0px 0px 9px 9px;
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

    </style>
@endsection

@section('content')
<div style="height:51px" class="card card-default color-palette-bo">
    <div style="height:51px" class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-user"></i> {{$user_details->name}}</h3>
        </div>
        <div class="d-inline-block float-right">
            <a href="{{route('admin.employees')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-undo"></i></a> &nbsp;
            <button data-id="{{$user_details->id}}" class="btn btn-sm btn-outline-success btn-edit"><i class="icon wb-check" aria-hidden="true"></i><i class="fa fa-edit"></i></button>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-left: 0px">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class=" mt-3">
                <!-- /.card-header -->
                <!-- form start -->
                <div class="">
                    @if(isset($user_details))
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">
                                    <div style="min-height:75vh"class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                          <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle img-bordered-sm" src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user_details->avatar) }}" alt="Bild">
                                          </div>
                          
                                          <h3 class="profile-username text-center">{{$user_details->name}}</h3>
                          
                                          <p class="text-muted text-center">{{$user_details->username}}</p>
                          
                                          <ul class="list-group list-group-flush mb-3">
                                            <li class="list-group-item">
                                              <b>Personalnummer</b> <a class="float-right">-</a>
                                            </li>
                                            <li class="list-group-item">
                                              <b>Funktion</b><a class="float-right">{{$user_details->department}}</a>
                                            </li>
                                              <li class="list-group-item">
                                              <b>Abteilung</b><a class="float-right">Büro / Montage</a>
                                            </li>
                                            <li class="list-group-item">
                                              <b>Eintrittsdatum</b> <a class="float-right"><time datetime="{{$user_details->login_date}}">{{$user_details->login_date}}</time></a>
                                            </li>
                                          <li class="list-group-item">
                                              <b>Austrittsdatum</b> <a class="float-right">-</a>
                                            </li>
                                              <li class="list-group-item"><br>
                                              <b>Adresse</b> <a class="float-right">{{$user_details->street}} {{$user_details->postal_code}}</a>
                                            </li>
                                              <li class="list-group-item">
                                              <b>Geburtsdatum</b> <a class="float-right">{{date('Y-m-d', strtotime($user_details->date_of_birth))}}</a>
                                            </li>
                                          <li class="list-group-item">
                                              <b>Nationalität</b> <a class="float-right">{{$user_details->nationality}}</a>
                                            </li>
                                          </ul>

                                        </div>
                                        <!-- /.card-body -->
                                      </div>
                                </div>
                                <div class="col-md-9">
                                    <div style="min-height:75vh" class="card card-primary card-outline card-tabs">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                          <ul class="nav nav-tabs border-bottom-0" id="custom-tabs-two-tab" role="tablist">
                                            <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Home</a>
                                            </li>
                                            <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Gehalt</a>
                                            </li>
                                              <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link" id="custom-tabs-two-settings-tab2" data-toggle="pill" href="#custom-tabs-two-settings2" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Leaves</a>
                                            </li>
                                              <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Schulung</a>
                                            </li>
                                              <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link" id="custom-tabs-two-settings-tab2" data-toggle="pill" href="#custom-tabs-two-settings4" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">PSA</a>
                                            </li>
                                            <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link" id="custom-tabs-two-settings-tab3" data-toggle="pill" href="#custom-tabs-two-settings3" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Lohnv.</a>
                                            </li>
                                              <li style="width:99px;text-align:center" class="nav-item">
                                              <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Dokum.</a>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="card-body ">
                                          <div class="tab-content" id="custom-tabs-two-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">  
                                                <ul class="list-group list-group-flush mb-3">
                                                    <div class="col-md-12">
                                                    
                                                    
                                                     <label class="col-md-12 control-label list-group-item-primary">
                                                                    Persönliche Daten
                                                        </label>   
                                                    <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Steuerklasse
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->tax_status}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    St. ID Nr.
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->STIDNUM}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                          <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Sozialvers. Nr.
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->sg_number}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                          <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Krankenkasse
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->health_insurance}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Kinderfreibetrag
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->tax_status}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Familienstand
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->STIDNUM}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                        
                                                   </div>
                                                   
                                                </ul>
                                                <ul class="list-group list-group-flush mb-3">
                                                    <div class="col-md-12">
                                                    
                                                    
                                                     <label class="col-md-12 control-label list-group-item-primary">
                                                                    Bankdaten
                                                        </label>   
                                                    <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Bankname
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->vds_identity}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    IBAN
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                               {{$user_details->vds_identity}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                          <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                   BIC
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                               {{$user_details->vds_identity}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                    
                                                    
                                                   </div>
                                                   
                                                </ul>
                                               <ul class="list-group list-group-flush mb-3">
                                                    <div class="col-md-12">
                                                    
                                                    
                                                     <label class="col-md-12 control-label list-group-item-primary">
                                                                    Sonstiges
                                                        </label>   
                                                    <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Führerschein
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->driving_license}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    VdS Ausweis
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                               {{$user_details->vds_identity}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Hubarbeitsbühne
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                               {{$user_details->vds_identity}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Stapler
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                               {{$user_details->vds_identity}}
                                                            </p>
                                                                </div>
                                                    </li>
                                                          
                                                   </div>
                                                   
                                                </ul>
                                                 
                                                
                                                
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                                
                                                <ul class="list-group list-group-flush mb-3">
                                                    <div class="col-md-12">
                                                    
                                                    
                                                     <label class="col-md-12 control-label list-group-item-primary">
                                                                    Gehalt & Urlaub
                                                        </label>   
                                                    <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Gehalt
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                                {{$user_details->hour_fee}} €
                                                            </p>
                                                                </div>
                                                    </li>
                                                         <li class="col-md-12 row">
                                                        <label class="col-md-3 control-label">
                                                                    Urlaubsanspruch
                                                        </label>
                                                        <div class="col-md-3">
                                                            <p class="form-control-static linkify">
                                                               {{$user_details->day_off}} Tage
                                                            </p>
                                                                </div>
                                                    </li>
                                                    
                                                    <label class="col-md-12 control-label list-group-item-primary">
                                                                    Auslöse
                                                        </label>  
                                                @foreach(App\Code::orderBy('KOD', 'ASC')->get() as $code)
                                                    <div>
                                                        <input @if(count(App\EmployeeCode::where('PersonelID', $user_details->id)->where('KodID', $code->KodID)->get()) > 0) checked @endif value="{{$code->KodID}}" type="checkbox" name="Kod-{{$code->KodID}}" disabled> {{$code->KodBASLIK}}
                                                    </div>
                                                @endforeach 
                                                    
                                                   </div>
                                                    
                                                     
                                                </ul>
                                                
                                                

                                            </div>
                                            
                                            <div class="tab-pane fade" id="custom-tabs-two-settings2" role="tabpanel" aria-labelledby="custom-tabs-two-settings-ta2b">
                                                @foreach(App\Code::orderBy('KOD', 'ASC')->get() as $code)
                                                    <div>
                                                        <input @if(count(App\EmployeeCode::where('PersonelID', $user_details->id)->where('KodID', $code->KodID)->get()) > 0) checked @endif value="{{$code->KodID}}" type="checkbox" name="Kod-{{$code->KodID}}" disabled> {{$code->KodBASLIK}}
                                                    </div>
                                                @endforeach   
                                            </div>
                                              <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                <div style="height:51px" class="card card-default color-palette-bo">
                <div style="height:51px" class="card-header">
                    <div class="d-inline-block">
                      <h3 class="card-title"><i class="fa fa-user-graduate"></i> Schulung</h3>
                    </div>
                    <div class="d-inline-block float-right">
                        <a data-toggle="modal" data-target="#modal-add" href="javascript:void(0)"class="btn btn-sm btn-outline-primary"><i class="fa fa-play-circle"></i></a>
                    </div>
                </div>
            </div>
                                                                <table class="table table-responsive-md table-striped table-hover">
                                                  <th>Datum</th><th>Schulung</th>
                                                    <tr>
                                                    <td>01.01.2020</td><td>100,00 €</td>
                                                    </tr>
                                                    <tr>
                                                    <td>01.01.2020</td><td>100,00 €</td>
                                                    </tr>
                                                    <tr>
                                                    <td>01.01.2020</td><td>100,00 €</td>
                                                    </tr>
                                                  </table>
                                            </div>
                                               <div class="tab-pane fade" id="custom-tabs-two-settings4" role="tabpanel" aria-labelledby="custom-tabs-two-settings-ta2b">
                                                   <div style="height:51px" class="card card-default color-palette-bo">
                <div style="height:51px" class="card-header">
                    <div class="d-inline-block">
                      <h3 class="card-title"><i class="fa fa-tshirt"></i> Persönliche Schutzausrüstung</h3>
                    </div>
                    <div class="d-inline-block float-right">
                        <a data-toggle="modal" data-target="#modal-add" href="javascript:void(0)"class="btn btn-sm btn-outline-primary"><i class="fa fa-play-circle"></i></a>
                    </div>
                </div>
            </div>
                                                <table class="table table-responsive-md table-striped table-hover">
                                                  <th>Datum</th><th>PSA</th>
                                                    <tr>
                                                    <td>01.01.2020</td><td>Jacke</td>
                                                    </tr>
                                                    <tr>
                                                    <td>01.01.2020</td><td>Schuhe</td>
                                                    </tr>
                                                    <tr>
                                                    <td>01.01.2020</td><td>Hose</td>
                                                    </tr>
                                                  </table>  
                                            </div>
                                              <div class="tab-pane fade" id="custom-tabs-two-settings3" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                                  <div style="height:51px" class="card card-default color-palette-bo">
                <div style="height:51px" class="card-header">
                    <div class="d-inline-block">
                      <h3 class="card-title"><i class="fa fa-credit-card"></i> Lohnvorschuss</h3>
                    </div>
                    <div class="d-inline-block float-right">
                        <a data-toggle="modal" data-target="#modal-add" href="javascript:void(0)"class="btn btn-sm btn-outline-primary"><i class="fa fa-play-circle"></i></a>
                    </div>
                </div>
            </div>
                                                <table class="table table-responsive-md table-striped table-hover">
                                                  <th>Datum</th><th>Bewegung</th>
                                                    <tr>
                                                    <td>01.01.2020</td><td>100,00 €</td>
                                                    </tr>
                                                    <tr>
                                                    <td>01.01.2020</td><td>100,00 €</td>
                                                    </tr>
                                                    <tr>
                                                    <td>01.01.2020</td><td>100,00 €</td>
                                                    </tr>
                                                    
                                                    
                                                  </table>
                                                  
                                                  
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Führerschein</b> <a class="float-right">{{$user_details->driving_license}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>VdS Ausweis</b><a class="float-right">{{$user_details->vds_identity}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Hubarbeitsbühnenschein</b><a class="float-right">Ja</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Stapler</b><a class="float-right">Nein</a>
                                                    </li>
                                                </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- /.card -->
                                      </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('modals')
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <form class="form-update-user" method="POST" action="{{route('admin.employees.update')}}">
            @csrf 
            <input type="hidden" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    Personal
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Adi')}}</label>
                            <input class="form-control"  name="name" required/>
                        </div>
                        <div class="form-group col-md-6 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Kullanici_Adi')}}</label>
                            <input class="form-control "  name="username" required/>
                        </div>
                        <div class="form-group col-md-6 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Sifresi')}}</label>
                            <input class="form-control" name="password"/>
                        </div>
                        <div class="form-group col-md-6 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Ekle_Personel_Numarasi')}}</label>
                            <input class="form-control "  name="number"/>
                        </div>

                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Ekle_Personel_Departman')}}</label>
                            <input class="form-control "  name="department"/>
                        </div>

                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Ekle_Personel_Saat_Ucreti')}}</label>
                            <input class="form-control "  name="hour_fee"/>
                        </div>

                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Ekle_Vergi_Durumu')}}</label>
                            <input class="form-control "  name="tax_status"/>
                        </div>

                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Ekle_Ise_Giris_Tarihi')}}</label>
                            <input type="date" class="form-control "  name="login_date"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Personel_Ekle_Izin_Gunu')}}</label>
                            <input class="form-control "  name="day_off"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Sokak_ve_Ev_Numarasi')}}</label>
                            <input class="form-control "  name="street"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Posta_Kodu_ve_Yer')}}</label>
                            <input class="form-control "  name="postal_code" />
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Dogum_Tarihi')}}</label>
                            <input type="date" class="form-control "  name="date_of_birth"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Dogum_Yeri')}}</label>
                            <input class="form-control "  name="place_of_birth"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Milliyet')}}</label>
                            <input class="form-control "  name="nationality"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Sosyal_Guvenlik_Numarasi')}}</label>
                            <input class="form-control "  name="sg_number"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Saglik_Sigortasi')}}</label>
                            <input class="form-control "  name="health_insurance"/>
                        </div>      
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Cikis')}}</label>
                            <input class="form-control "  name="exit"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Islev')}}</label>
                            <input class="form-control "  name="function"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_ST_Id_Num')}}</label>
                            <input class="form-control "  name="STIDNUM" required/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Ehliyet')}}</label>
                            <select class="form-control "  name="driving_license">
                            <option>Nein</option> <option>Ja</option></select>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_VDS_Kimligi')}}</label>
                            <select class="form-control "  name="vds_identity">
                            <option>Nein</option> <option>Ja</option></select>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Banka')}}</label>
                            <input class="form-control "  name="bank" required/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Iban')}}</label>
                            <input class="form-control "  name="IBAN"/>
                        </div>
                        <div class="form-group col-md-4 m05">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Bic')}}</label>
                            <input class="form-control "  name="BIC"/>
                        </div>
                        <div class="col-md-12 vCheck">
                            <label class="form-control-label plabelno" for="inputBasicLastName">{{$lang::settings('Admin_Personel_Ekle_Bic')}}</label>

                            @foreach(App\Code::orderBy('KOD', 'ASC')->get() as $code)
                                <div>
                                    <input value="{{$code->KodID}}" type="checkbox" name="codes[{{$code->KodID}}]"> {{$code->KodBASLIK}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button data-dismiss="modal" type="button" class="btn btn-default">Close</button>
                    <button  type="submit" class="btn btn-primary">{{$lang::settings('Isci_Paneli_Kaydet')}}</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>

<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{$lang::settings('Isci_Paneli_Kaydi_Sil')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>{{$lang::settings('Isci_Paneli_Emin_Misiniz')}}</strong></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{$lang::settings('Isci_Paneli_Hayir')}}</button>
                <button class="btn btn-outline-light btn-delete-go">{{$lang::settings('Isci_Paneli_Evet_Sil')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('scripts')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
        $("#example1").DataTable();

        $(".silbtn").click(function(){
            var href = $(this).attr("data-href");
            $(".mdlsilbtn").attr("href", href);
        });

        $(".selectable-all").click(function(){
            $('.selectable-item').not(this).prop('checked', this.checked);
        });

        $('.btn-edit').on('click', function(e){
            e.preventDefault();
            $('#modal-lg').modal('show');
            $.ajax({
                url: "{{route('admin.employees.edit')}}",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $(this).data('id'),
                },
                success: function(resp){
                    let form = $('.form-update-user');
                    let user = resp.user; 
                    let codes = resp.codes;
                    form.find('input[name=id]').val(user.id);
                    form.find('input[name=name]').val(user.name);
                    form.find('input[name=username]').val(user.username);
                    form.find('input[name=password]').val(user.password);
                    form.find('select[name=role]').val(user.role);
                    form.find('select[name=status]').val(user.status);
                    form.find('input[name=number]').val(user.number);
                    form.find('input[name=department]').val(user.department);
                    form.find('input[name=hour_fee]').val(user.hour_fee);
                    form.find('input[name=tax_status]').val(user.tax_status);
                    form.find('input[name=login_date]').val(user.login_date);
                    form.find('input[name=day_off]').val(user.day_off);
                    form.find('input[name=street]').val(user.street);
                    form.find('input[name=postal_code]').val(user.potal_code);
                    form.find('input[name=date_of_birth]').val(user.date_of_birth);
                    form.find('input[name=place_of_birth]').val(user.place_of_birth);
                    form.find('input[name=nationality]').val(user.nationality);
                    form.find('input[name=sg_number]').val(user.sg_number);
                    form.find('input[name=health_insurance]').val(user.health_insurance);
                    form.find('input[name=exit]').val(user.exit);
                    form.find('input[name=function]').val(user.function);
                    form.find('input[name=STIDNUM]').val(user.STIDNUM);
                    form.find('select[name=driving_license]').val(user.driving_license);
                    form.find('select[name=vds_identity]').val(user.vds_identity);
                    form.find('input[name=bank]').val(user.bank);
                    form.find('input[name=IBAN]').val(user.IBAN);
                    form.find('input[name=BIC]').val(user.BIC);

                    $.each(codes, function(index, code){
                        form.find('input[name="codes['+code.KodID+']"]').prop('checked', true);
                    });
                }
            });
        });

        $('.form-update-user').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp){
                    if(resp.success){
                    Toast.fire({
                        icon: 'success',
                        toast: true,
                        timerProgressBar: false,
                        title: resp.msg,
                        timer:1000,
                        showConfirmButton: false,
                    });

                    setTimeout(function() { location.reload(); }, 963)
                    }
                    
                } 
            }) 
        });

        $('.btn-delete').on('click', function(){
            $('#modal-danger').modal('show');
            $('.btn-delete-go').attr('data-id', $(this).data('id'));
        });

        $('.btn-delete-go').on('click', function(){
            $.ajax({
                url: "{{route('admin.employees.destroy')}}",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    GunID : $(this).data('id')
                },
                success: function(resp){
                    if(resp.success){
                        Toast.fire({
                            icon: 'success',
                            timerProgressBar: false,
                            title: resp.msg,
                            showConfirmButton: false,
                        });

                        setTimeout(function() { location.reload(); }, 1000)
                    }
                }
            })
        });
    });

    
</script>
@endsection