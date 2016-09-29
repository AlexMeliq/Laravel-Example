<div class="form-group">
    {!! Form::label('title') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('excerpt') !!}
    {!! Form::textarea('excerpt', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content') !!}
    {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published') !!}
    {!! Form::checkbox('published', null, false) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Publish On') !!}
    {!! Form::input('timestamp', 'published_at', null, ['class'=>'form-control'] ) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
</div>