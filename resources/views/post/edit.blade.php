@extends('app')

@section('content')
    @if(Auth::check())
        <div class="panel-body">
            <h1>Edit Post</h1>
            {!! Form::model($post, ['action' => ['PostController@update', $post -> id], 'method' => 'PATCH']) !!}
            @include('post._form', ['submitText'=>'Update Post'])
            {!! Form::close() !!}
            @include('errors.list')
        </div>
    @else
        <div class="panel-body">
            <h1>You hav not access</h1>
        </div>

    @endif
@stop
