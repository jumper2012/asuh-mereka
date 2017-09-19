@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Manage Foto Keterangan Anak | {{ $nama_anak }}</h4></div>
                <div class="panel-body">
                    <a href="/anak/foto-keterangan/create/{{ $id }}" class="btn btn-success btn-xm" title="Add New Anak">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create Foto Keterangan Anak
                    </a>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Foto Profil</th><th>Jenis Kelamin</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($foto_keterangan_anak as $item)
                                <tr>
                                    <td>{{ $item->image }}</td><td>{{ $item->dekripsi }}</td>
                                    <td>
                                        <a href="{{ url('/anak/' . $item->id) }}" title="View Anak"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/anak/' . $item->id . '/edit') }}" title="Edit Anak"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/anak', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Delete Anak',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $foto_keterangan_anak->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
