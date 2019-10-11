@extends('layouts/main')
@section('title', 'exort/import data')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('import.employee')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="import">Import Employee</label>
                        <input name="import" type="file" class="form-control-file @error('import') is-invalid @enderror" id="import">
                        @error('import')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Import</button>
                </form>
                <hr>
                <div class="form-group">
                    <label for="import">Export Employee</label><br>
                    <a href="{{route('export.employee')}}" class="btn btn-sm btn-info">Export</a>
                </div>
            </div>
        </div>
    </div>
@endsection
