@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Manage Anak</h4></div>
                <div class="panel-body">
                    <a href="{{ url('/anak/create') }}" class="btn btn-success btn-xm" title="Add New Anak">
                        <i class="fa fa-plus" aria-hidden="true"></i> Daftarkan Anak
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/anak', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th><th>Foto Profil</th><th>Jenis Kelamin</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($anak as $item)
                                <tr>
                                    <td>{{ $item->nama_lengkap }}</td><td>{{ $item->foto_profil }}</td><td>{{ $item->jenis_kelamin }}</td>
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
                                        <a href="{{ url('/anak/foto-keterangan-anak/' . $item->id) }}" title="Foto Deskripsi Anak"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Foto Deskripsi Anak</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $anak->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
