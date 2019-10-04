@extends('layouts/main')
@section('title', 'position')

@section('main')
    <div class="container">
        <div class="row">
            @include('message.success')
            <div class="col-md-10">
                <h5>List Of {{$position->position}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Position</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employees as $key => $employee)
                            <tr>
                                <td scope="row" class="text-center">{{ $employees->firstItem() + $key }}</td>
                                <td scope="row">
                                    <a href="{{ url('/employee/'.$employee->id) }}">
                                        {{ $employee->name}}
                                    </a>
                                </td>
                                <td scope="row">{{ $employee->sex}}</td>
                                <td scope="row">{{ $employee->position->position}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">{{$employees->links()}}</div>
                </div>    
            </div>
        </div>
    </div>
@endsection