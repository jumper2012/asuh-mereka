<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('foto', 'Photo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(isset($user->image)) 
            <img src="{{ asset('images/anak/keterangan/'.$foto_keterangan->image)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">        
        @else
            <img src="/images/user/user-default.png" id="showgambar" style="max-width:250px;max-height:150px;float:left;" />
        @endif        
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="file" id="inputgambar" name="image" class="validate"/ >
    </div>
</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    {!! Form::label('deskripsi', 'Deskripsi Foto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{!! Form::hidden('anak_id', $id, ['class' => 'form-control']) !!}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Simpan Foto Dan Keterangan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });
</script>