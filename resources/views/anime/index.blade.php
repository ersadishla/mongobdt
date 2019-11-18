@extends('app')

@section('content')
    <h1 class="text-center">Recommendations Anime</h1>
    <a href="{{ route('anime.create') }}" class="btn btn-outline-success">Add Anime</a>
    <a href="{{ route('anime.typeavg') }}" class="btn btn-outline-info">Average Anime Rating by Type</a>
    <a href="{{ route('anime.typesum') }}" class="btn btn-outline-info">Sum Anime by Type</a>
    <table class="table table-bordered" id="anime-table">
        <thead>
            <tr>
                <th>Anime ID</th>
                <th>Name</th>
                <th>Genre</th>
                <th>Type</th>
                <th>Episodes</th>
                <th>Rating</th>
                <th>Members</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animes as $anime)
            <tr>
                <td>{{$anime->anime_id}}</td>
                <td>{{$anime->name}}</td>
                <td>{{$anime->genre}}</td>
                <td>{{$anime->type}}</td>
                <td>{{$anime->episodes}}</td>
                <td>{{$anime->rating}}</td>
                <td>{{$anime->members}}</td>
                <td>
                    <a href="{{ route('anime.edit', $anime->_id) }}" class="btn btn-outline-info">Edit</a>
                </td>
                <td>
                    <form action="{{ route('anime.destroy', $anime->_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>	
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    {{$animes->links()}}
@endsection

@section('script')

@endsection