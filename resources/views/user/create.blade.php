@extends('app')

@section('content')
    @if(Auth::check())
        <div class="panel-body">
            <h1>Create New Post</h1>
            {!! Form::open(['route' => 'user.store']) !!}
            @include('user._form', ['submitText'=>'Create New Post'])
            {!! Form::close() !!}
            @include('errors.list')
        </div>
    @else
        <div class="panel-body">
            <h1>You hav not access</h1>
        </div>

    @endif
@stop
