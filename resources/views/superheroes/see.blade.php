@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register of {{$hero->real_name}}</div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <label for="nickname" class="col-md-4 control-label">Nickname</label>
                            <div class="col-md-6 pa">
                                {{$hero->nickname}}
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="real_name" class="col-md-4 control-label">Real Name</label>
                            <div class="col-md-6">
                                {{$hero->real_name}}
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="origin_description" class="col-md-4 control-label">Origin
                                Description</label>
                            <div class="col-md-6">
                                {{$hero->origin_description}}
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="superpowers" class="col-md-4 control-label">Super Powers</label>
                            <div class="col-md-6">
                                {{$hero->superpowers}}
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="catch_phrase" class="col-md-4 control-label">Catch Phrase:</label>
                            <div class="col-md-6">
                                {{$hero->catch_phrase}}
                            </div>
                        </div>
                        @if(count($hero->photos) >0)
                            <h1 class="my-4 text-center text-lg-left">Gallery</h1>
                            <div class="row text-center text-lg-left">
                                @foreach ($hero->photos as $photo)
                                    <div class="col-lg-3 col-md-4 col-xs-6">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        <img class="img-fluid img-thumbnail" src="/{{$photo->image}}" alt="">
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
<script>

</script>
