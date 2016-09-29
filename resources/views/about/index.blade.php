@extends('app')
@section('content')
    <div class="panel panel-heading">About</div>
    @foreach($abouts as $about)
        <div class="panel-body">
            <div class="panel panel-heading">
                <h2>{!! $about -> title !!}</h2>
            </div>
            <p>
                {!! $about -> content !!}
            </p>
        </div>
    @endforeach
@stop