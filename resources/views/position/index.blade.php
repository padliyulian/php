@extends('layouts/main')
@section('title', 'positions')

@section('main')
    <div class="container">
        <div class="row">
            @include('message.success')
            <div class="col">
                <h5>List Of Positions</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Position</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (!$positions->isEmpty())
                                @foreach ($positions as $key => $position)
                                <tr>
                                    <td scope="row" class="text-center">{{ $positions->firstItem() + $key }}</td>
                                    <td scope="row">
                                        <a href="{{ url('/position/'.$position->id) }}">
                                            {{ $position->position}}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="text-danger text-center">No data to view ...</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">{{$positions->links()}}</div>
                </div>    
            </div>
        </div>
    </div>
@endsection