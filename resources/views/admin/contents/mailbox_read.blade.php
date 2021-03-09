@extends('layouts.admin.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Mailbox</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              @if(auth()->user()->myrole->name == 'admin')
                <a href="{{route('admin.mailbox.compose')}}" class="btn btn-primary btn-block mb-3">Compose</a>
              @else 
                <a href="{{route('mailbox.compose')}}" class="btn btn-primary btn-block mb-3">Compose</a>
              @endif
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Folders</h3>
        
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                      @if(auth()->user()->myrole->name == 'admin')
                      <li class="nav-item">
                        <a href="{{route('admin.mailbox')}}" class="nav-link">
                          <i class="far fa-envelope"></i> Inbox
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('admin.mailbox.sent')}}" class="nav-link">
                          <i class="far fa-file-alt"></i> Sent
                        </a>
                      </li>
                      @else 
                      <li class="nav-item">
                        <a href="{{route('mailbox')}}" class="nav-link">
                          <i class="far fa-envelope"></i> Inbox
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('mailbox.sent')}}" class="nav-link">
                          <i class="far fa-file-alt"></i> Sent
                        </a>
                      </li>
                      @endif
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Sent Mail</h3>
    
                    <div class="card-tools">
                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                    <h5>Subject: {{$email->subject}}</h5>
                    <h6>To: {{$email->sender->name}}
                        <span class="mailbox-read-time float-right">{{date('d M, Y H:i A', strtotime($email->created_at))}}</span></h6>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">{!! $email->content !!}</div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
                <div class="card-footer">
                    <div class="float-right">
                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                </div>
                <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection