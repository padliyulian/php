@extends('layouts/dashboard/index')
@section('title', 'employees')

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
              <h3 class="card-title">List Of Employees</h3>
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
                        @include('message.success')
                        <div class="col-md-10">
                            <div class="form-group">
                                <form action="{{ route('search.employee') }}" method="get">
                                    <input
                                        type="text"
                                        name="keyword"
                                        class="form-control @error('keyword') is-invalid @enderror"
                                        id="keyword"
                                        placeholder="Search employee by name or email then press enter ..."
                                        autocomplete="off"
                                    >
                                    @error('keyword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </form>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ url('/employee/create') }}" class="btn btn-success">
                                <i class="fas fa-user-plus"></i>
                            </a>
                            <a href="{{ route('export.employee') }}" class="btn btn-info">
                                <i class="fas fa-file-excel"></i>
                            </a>
                            <a href="{{ route('print.employee') }}" class="btn btn-primary" target="_blank">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sex</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @if (!$employees->isEmpty())
                                            @foreach ($employees as $key => $employee)
                                            <tr>
                                                <td scope="row" class="text-center">{{ $employees->firstItem() + $key }}</td>
                                                <td scope="row">{{ $employee->nik}}</td>
                                                <td scope="row">
                                                <a href="{{ url('/employee/'.$employee->id) }}">
                                                        {{ $employee->name}}
                                                    </a>
                                                </td>
                                                <td scope="row">{{ $employee->sex }}</td>
                                                <td scope="row">{{ $employee->position->position }}</td>
                                                <td scope="row">{{ $employee->email }}</td>
                                                <td scope="row" class="j-mw-100">
                                                    <a href="{{ url('/employee/'.$employee->id.'/edit') }}" class="btn btn-sm btn-warning">
                                                        <span style="color: white;"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                    <form action="{{ url('/employee/'.$employee->id) }}" method="POST" class="d-inline js-form__delete">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="d-inline btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-danger text-center">No data to view ...</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">{{$employees->links()}}</div>
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