@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Tambahkan Foto Keterangan | {{ $nama_anak }}
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/anak">Manage Anak</a></li>
            <li class="active">Tambahkan Form&Keterangan {{ $nama_anak }}</li>
          </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
            <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Data Foto-foto {{ $nama_anak }}</h3>
                    </div>
                
                    <div class="panel-body">
                            <a href="{{ url('/anak-list-pengurus') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <br />
                            <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! Form::open(['url' => '/foto_keterangan', 'class' => 'form-horizontal', 'files' => true]) !!}

                            @include ('anak.form-foto-keterangan')

                            {!! Form::close() !!}

                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection
