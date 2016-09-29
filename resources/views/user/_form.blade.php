<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('login') !!}
    {!! Form::text('login', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password') !!}
    {!! Form::password('password', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('permission') !!}
    {!! Form::text('permission', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitText, ['class'=>'btn btn-primary']) !!}
</div>