@extends('welcome')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Create New Soal</h4></div>
                <div class="panel-body">
                    <a href="{{ url('/soal') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/soal', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('soal.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </section>
    </div>
@endsection
