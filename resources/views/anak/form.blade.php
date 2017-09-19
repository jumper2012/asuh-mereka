<div class="form-group {{ $errors->has('nama_lengkap') ? 'has-error' : ''}}">
    {!! Form::label('nama_lengkap', 'Nama Lengkap', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_lengkap', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_lengkap', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('gender', array('laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'), !empty($user->gender) ? $user->gender : 'laki-laki', array('class' => 'form-control select2')) !!}
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>     
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tanggal_lahir', null, ['class' => 'form-control pull-right datepicker']) !!}
        {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('temat_lahir', 'Tempat Lahir', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tempat_lahir',$cities_born, !empty($user->state_id) ? $user->city_id : 1, array('class' => 'form-control select2')) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('agama') ? 'has-error' : ''}}">
    {!! Form::label('agama', 'Agama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('agama', null, ['class' => 'form-control']) !!}
        {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('suku') ? 'has-error' : ''}}">
    {!! Form::label('suku', 'Suku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('suku', null, ['class' => 'form-control']) !!}
        {!! $errors->first('suku', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('state', 'Provinsi Tempat Tinggal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('state_id',$state, !empty($user->state_id) ? $user->state_id : 11, array('class' => 'form-control select2')) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('city', 'Kota Tempat Tinggal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('city_id',$cities, !empty($user->state_id) ? $user->city_id : 1, array('class' => 'form-control select2')) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    {!! Form::label('deskripsi', 'Deskripsi Anak', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('foto', 'Photo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(isset($user->image)) 
            <img src="{{ asset('images/user/'.$user->image)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">        
        @else
            <img src="/images/user/user-default.png" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        @endif        
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('', '', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="file" id="inputgambar" name="image" class="validate"/ >
    </div>
</div>

<?php $admin_id = auth()->user()->id; ?>
{!! Form::hidden('admin_id', $admin_id, ['class' => 'form-control']) !!}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tambahkan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<link rel="stylesheet" href="{{ URL::asset('bower_components/select2/dist/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
<script type="text/javascript">
    $(document).ready(function()
    {
        $('.select2').select2({ width: '100%' })

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })


        $('select[name="state_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID)
            {
                $.ajax({
                    url: '/home/kabupaten/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data)
                    {
                        console.log(data);
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else
            {

                $('select[name="city"]').empty();
            }
        });
    });
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