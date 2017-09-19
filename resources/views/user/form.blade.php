<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nama lengkap', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('gender', 'Jenis kelamin', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('gender', array('laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'), !empty($user->gender) ? $user->gender : 'laki-laki', array('class' => 'form-control select2')) !!}
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('agama') ? 'has-error' : ''}}">
    {!! Form::label('agama', 'Agama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('gender', array('budha' => 'Budha', 'hindu' => 'Hindu', 'islam' => 'Islam', 'katolik' => 'Katolik', 'konghucu' => 'Konghucu', 'kristen' => 'Kristen'), !empty($user->agama) ? $user->agama : 'budha', array('class' => 'form-control select2')) !!}
        {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('suku') ? 'has-error' : ''}}">
    {!! Form::label('suku', 'Suku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('suku', null, ['class' => 'form-control']) !!}
        {!! $errors->first('suku', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if(auth()->user()->roles[0]["display_name"]=="Anggota")                           
<div class="form-group {{ $errors->has('pendidikan_tertinggi') ? 'has-error' : ''}}">
    {!! Form::label('pendidikan_tertinggi', 'Pendidikian tertinggi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pendidikan_tertinggi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pendidikan_tertinggi', '<p class="help-block">:message</p>') !!}
    </div>
</div> 
<div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : ''}}">
    {!! Form::label('pekerjaan', 'Pekerjaan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pekerjaan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('pekerjaan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pendapatan') ? 'has-error' : ''}}">
    {!! Form::label('pendapatan', 'Pendapatan per bulan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('gender', array('< Rp. 5.000.000,-' => '< Rp. 5.000.000,-', 'Rp. 5.000.000,-  s/d  Rp. 10.000.000,-' => 'Rp. 5.000.000,-  s/d  Rp. 10.000.000,-', 'Rp. 10.000.000,-  s/d  Rp. 20.000.000,-' => 'Rp. 10.000.000,-  s/d  Rp. 20.000.000,-', '>  Rp. 20.000.000,-' => '>  Rp. 20.000.000,-'), !empty($user->pendapatan) ? $user->pendapatan : '< Rp. 5.000.000,-', array('class' => 'form-control select2')) !!}
        {!! $errors->first('pendapatan', '<p class="help-block">:message</p>') !!}
    </div>
</div> 
@endif
<div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : ''}}">
    {!! Form::label('date_of_birth', 'Tanggal lahir', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('date_of_birth', null, ['class' => 'form-control pull-right datepicker']) !!}
        {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('state', 'Provinsi tempat tinggal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('state_id',$state, !empty($user->state_id) ? $user->state_id : 11, array('class' => 'form-control select2')) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('city', 'Daerah tempat tinggal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('city_id',$cities, !empty($user->state_id) ? $user->city_id : 1, array('class' => 'form-control select2')) !!}
    </div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Alamat lengkap', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('foto', 'Foto diri', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(isset($user->image)) 
            <img src="{{ asset('images/user/'.$user->image)  }}" id="showgambar" style="max-height:200px;max-width:200px;margin-top:10px;">        
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

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
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