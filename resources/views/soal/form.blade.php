<div class="form-group {{ $errors->has('soal') ? 'has-error' : ''}}">
    {!! Form::label('soal', 'Soal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('soal', null, ['class' => 'form-control']) !!}
        {!! $errors->first('soal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('a') ? 'has-error' : ''}}">
    {!! Form::label('a', 'A', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('a', null, ['class' => 'form-control']) !!}
        {!! $errors->first('a', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('b') ? 'has-error' : ''}}">
    {!! Form::label('b', 'B', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('b', null, ['class' => 'form-control']) !!}
        {!! $errors->first('b', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('c') ? 'has-error' : ''}}">
    {!! Form::label('c', 'C', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('c', null, ['class' => 'form-control']) !!}
        {!! $errors->first('c', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('d') ? 'has-error' : ''}}">
    {!! Form::label('d', 'D', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('d', null, ['class' => 'form-control']) !!}
        {!! $errors->first('d', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('jawaban') ? 'has-error' : ''}}">
    {!! Form::label('jawaban', 'Jawaban', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('jawaban', ['a', 'b', 'c', 'd'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('jawaban', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
