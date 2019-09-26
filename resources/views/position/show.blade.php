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
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">NO</th>
                            <th scope="col">NAME</th>
                            <th scope="col">SEX</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                            <td scope="row">
                                <a href="{{ url('/employee/'.$employee->id) }}">
                                    {{ $employee->name}}
                                </a>
                            </td>
                            <td scope="row">{{ $employee->sex}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection