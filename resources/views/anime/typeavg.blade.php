@extends('app')

@section('content')
    <h1 class="text-center">Anime Type Average</h1>
    <table class="table table-bordered" id="anime-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Average Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animes as $anime)
            <tr>
                <td>{{$anime->_id}}</td>
                <td>{{$anime->avgRating}}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')

@endsection