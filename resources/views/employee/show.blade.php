@extends('layouts/dashboard/index')
@section('title', 'employee detail')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Employees</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
    
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Employee</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
                <div class="container px-0">
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="/storage/img/employee/{{ $employee->photo }}" class="card-img-top" alt="photo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $employee->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $employee->nik }}</h6>
                                    <p class="card-text">
                                        Sex : {{ $employee->sex }} <br>
                                        Email : {{ $employee->email }} <br>
                                        Position: {{ $employee->position->position }}
                                    </p>
                                    <a href="{{ url('/employee') }}" class="btn btn-primary btn-sm">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection