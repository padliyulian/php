@extends('layouts/main')
@section('title', 'employee edit')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/employee/{{ $employee->id }}" method="POST">
                    @method('patch')
                    @csrf
                    @include('partial.form', ['btn_title' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection