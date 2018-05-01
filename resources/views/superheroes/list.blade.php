@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row center-block">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
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
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nickname</th>
                            <th >Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($super_heroes as $entry )
                            <tr >

                                <td >
                                    @if($entry->photo['image'])
                                    <img class="img-responsive img-hero img-circle" src="/{{$entry->photo['image']}}" >
                                        @endif
                                   </td>
                                <td >{{$entry->nickname}}</td>
                                <td>
                                    <a href="{{ route('superheroes/see', ['id' =>$entry]) }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                    <a href="{{ route('superheroes/edit', ['id' =>$entry]) }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="{{ route('superheroes/delete', ['id' =>$entry]) }}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td colspan="9">
                                    :( No hero was found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="farmaco--panel text-center">
                    {{ $super_heroes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
