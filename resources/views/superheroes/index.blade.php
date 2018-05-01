@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register a new Hero</div>

                    <div class="panel-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <ul>
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </ul>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('superheroes/save') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="id" type="hidden" class="form-control" name="id" value="{{ old('id', $hero['id']) }}">
                            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                                <label for="nickname" class="col-md-4 control-label">Nickname</label>
                                <div class="col-md-6">
                                    <input id="nickname" type="text" class="form-control" name="nickname"
                                           value="{{ old('nickname', $hero['nickname']) }}" required autofocus>
                                    @if ($errors->has('nickname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('real_name') ? ' has-error' : '' }}">
                                <label for="real_name" class="col-md-4 control-label">Real Name</label>
                                <div class="col-md-6">
                                    <input id="real_name" type="text" class="form-control" name="real_name"
                                           value="{{ old('real_name', $hero['real_name']) }}" required autofocus>
                                    @if ($errors->has('real_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('real_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('origin_description') ? ' has-error' : '' }}">
                                <label for="origin_description" class="col-md-4 control-label">Origin
                                    Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="origin_description" id="origin_description"
                                              required>{{ old('origin_description', $hero['origin_description']) }}</textarea>
                                    @if ($errors->has('origin_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('origin_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('superpowers') ? ' has-error' : '' }}">
                                <label for="superpowers" class="col-md-4 control-label">Super Powers</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="superpowers" id="superpowers"
                                              required>{{ old('superpowers', $hero['superpowers']) }}</textarea>
                                    @if ($errors->has('superpowers'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('superpowers') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('catch_phrase') ? ' has-error' : '' }}">
                                <label for="catch_phrase" class="col-md-4 control-label">Catch Phrase:</label>
                                <div class="col-md-6">
                                    <input id="catch_phrase" type="text" class="form-control" name="catch_phrase"
                                           value="{{ old('catch_phrase', $hero['catch_phrase']) }}" required autofocus>
                                    @if ($errors->has('catch_phrase'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('catch_phrase') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('photos[]') ? ' has-error' : '' }}">
                                <label for="catch_phrase" class="col-md-4 control-label">Photos:</label>
                                <div class="col-md-6">

                                    <label class="btn btn-default">
                                        <input type="file" name="photos[]" multiple/>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                            @if(count($hero->photos) >0)
                                <h1 class="my-4 text-center text-lg-left">Gallery</h1>
                                <div class="row text-center text-lg-left">
                                    @foreach ($hero->photos as $photo)
                                        <div class="col-lg-3 col-md-4 col-xs-6">
                                            <a href="#" class="d-block mb-4 h-100" data-deteleherophoto="{{$photo->id}}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                                <img class="img-fluid img-thumbnail" src="/{{$photo->image}}" alt="">
                                            </a>
                                        </div>
                                    @endforeach;
                                </div>
                            @endif;

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
