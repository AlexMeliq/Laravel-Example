@extends('app')

@section('content')
    <div class="h1 panel panel-heading">
        <h1><a href="/blog">BLOG</a> <span>/{{ $post -> title }}</span></h1>
        @if(Auth::check())
            <div class="addPost">
                <a class="btn btn-success" href="{{route('post.create')}}">Add New Post</a>
                <a class="btn btn-success" href="{{ URL::action('PostController@unpublished') }}">Unpublished Posts</a>
            </div>
        @endif
    </div>
    <div class="panel-body">
        <p>
            {!! $post -> content !!}
        </p>
        <p>
            published: {!! $post -> published_at !!}
        </p>
        <b>@if(Auth::check())
                <div class="fLeft">
                    <a class="btn btn-primary" href="{{route('post.edit',[$post->id])}}">Edit</a>
                </div>
                {!! Form::open(['action' => ['PostController@destroy', $post -> id],'class'=>'fLeft', 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endif
        </b>
    </div>
@stop