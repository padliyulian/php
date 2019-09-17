@extends('layouts/main')
@section('title', 'employees')

@section('main')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="col-md-10">
                <h5>List Of Employee</h5>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ url('/employee/create') }}" class="btn btn-info mb-2">Add</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">NO</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NAME</th>
                            <th scope="col">SEX</th>
                            <th scope="col">POSITION</th>
                            <th scope="col">DATE CREATED</th>
                            <th scope="col">DATE UPDATE</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                            <td scope="row">{{ $employee->nik}}</td>
                            <td scope="row">
                            <a href="{{ url('/employee/'.$employee->id) }}">
                                    {{ $employee->name}}
                                </a>
                            </td>
                            <td scope="row">{{ $employee->sex}}</td>
                            <td scope="row">{{ $employee->position}}</td>
                            <td scope="row">{{ $employee->created_at}}</td>
                            <td scope="row">{{ $employee->updated_at}}</td>
                            <td scope="row">
                                <a href="{{ url('/employee/'.$employee->id.'/edit') }}" class="badge badge-success">edit</a>
                                <form action="{{ url('/employee/'.$employee->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge badge-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection