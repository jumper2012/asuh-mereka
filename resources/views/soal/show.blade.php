@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-default">
                    <div class="panel-heading"><h4>Soal {{ $soal->id }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/soal') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/soal/' . $soal->id . '/edit') }}" title="Edit Soal"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['soal', $soal->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Soal',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $soal->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> 
                                            Soal 
                                        </th>
                                        <td> 
                                            {{ $soal->soal }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> 
                                            A 
                                        </th>
                                        <td> 
                                            {{ $soal->a }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> 
                                            B 
                                        </th>
                                        <td> 
                                            {{ $soal->b }} 
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <th> 
                                            C 
                                        </th>
                                        <td> 
                                            {{ $soal->c }} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> 
                                            D 
                                        </th>
                                        <td> 
                                            {{ $soal->d }} 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </section>
    </div>
@endsection
