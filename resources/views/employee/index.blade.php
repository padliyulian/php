@extends('layouts/main')
@section('title', 'employees')

@section('main')
    <div class="container">
        <div class="row">
            @include('message.success')
            <div class="col">
                <h5>List Of Employees</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <form action="{{ url('/search/employee') }}" method="get">
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
            <div class="col-md-2">
                <a href="{{ url('/employee/create') }}" class="btn btn-primary btn-block mb-2">Add New</a>
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
                                    <td scope="row">
                                        <a href="{{ url('/employee/'.$employee->id.'/edit') }}" class="btn btn-sm btn-warning">edit</a>
                                        <form action="{{ url('/employee/'.$employee->id) }}" method="POST" class="d-inline js-form__delete">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="d-inline btn btn-sm btn-danger">delete</button>
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
@endsection