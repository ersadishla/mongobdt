@extends('app')

@section('content')
    <h1 class="text-center">Anime Type Sum</h1>
    <table class="table table-bordered" id="anime-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animes as $anime)
            <tr>
                <td>{{$anime->_id}}</td>
                <td>{{$anime->count}}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')

@endsection