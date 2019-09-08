@extends('layouts/main')
@section('title', 'employee add')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ url('/employee') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <input name="sex" type="text" class="form-control" id="sex" placeholder="Sex">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input name="position" type="text" class="form-control" id="position" placeholder="Position">
                    </div>
                    <button type="submit" class="btn btn-info">add</button>
                </form>
            </div>
        </div>
    </div>
@endsection