@extends('app')
@section('content')
    <div class="h1 panel panel-heading">
        <h1><a href="{{ URL('/blog')}}">BLOG</a> </h1>
        @if(Auth::check())
            <div class="addPost">
                <a class="btn btn-success" href="{{route('post.create')}}">Add New Post</a>
                <a class="btn btn-success" href="{{ URL::action('PostController@unpublished') }}">Unpublished Posts</a>
            </div>
        @endif
    </div>
    @foreach($posts as $post)
        <div class="panel-body">
            <div class="panel panel-heading">
                <h2><a href="{{route('post.show',[$post->id])}}"> {!! $post -> title !!}</a></h2>
            </div>
            <p>
                {!! $post -> excerpt !!}
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
    @endforeach
    {!! $posts->render(); !!}
@stop