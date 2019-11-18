@extends('app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Anime') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('anime.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="anime_id" class="col-md-4 col-form-label text-md-right">{{ __('Anime ID') }}</label>

                            <div class="col-md-6">
                                <input id="anime_id" type="number" class="form-control{{ $errors->has('anime_id') ? ' is-invalid' : '' }}" name="anime_id" value="{{ old('anime_id') }}" autofocus>

                                @if ($errors->has('anime_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('anime_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                            <div class="col-md-6">
                                <input id="genre" type="text" class="form-control{{ $errors->has('genre') ? ' is-invalid' : '' }}" name="genre" value="{{ old('genre') }}" autofocus>

                                @if ($errors->has('genre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control">
                                    <option value="Special">Special</option>
                                    <option value="OVA">OVA</option>
                                    <option value="Music">Music</option>
                                    <option value="Movie">Movie</option>
                                    <option value="TV">TV</option>
                                    <option value="ONA">ONA</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="episodes" class="col-md-4 col-form-label text-md-right">{{ __('Episodes') }}</label>

                            <div class="col-md-6">
                                <input id="episodes" type="number" class="form-control{{ $errors->has('episodes') ? ' is-invalid' : '' }}" name="episodes" value="{{ old('episodes') }}" autofocus>

                                @if ($errors->has('episodes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('episodes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>

                            <div class="col-md-6">
                                <input id="rating" type="number" step="0.1" class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" name="rating" value="{{ old('rating') }}" autofocus>

                                @if ($errors->has('rating'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="members" class="col-md-4 col-form-label text-md-right">{{ __('Members') }}</label>

                            <div class="col-md-6">
                                <input id="members" type="number" class="form-control{{ $errors->has('members') ? ' is-invalid' : '' }}" name="members" value="{{ old('members') }}" autofocus>

                                @if ($errors->has('members'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('members') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection