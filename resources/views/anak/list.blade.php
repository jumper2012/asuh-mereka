@extends('welcome')
@section('content')

<div class="content-wrapper">
    <section class="content">

        <header-list-anak>
            <h1-list-anak>List Anak Terlantar </h1-list-anak>
        </header-list-anak>
        <div>
            <div class="span8 relative">
                <div class="count-records"> 
                    <?php 
                        $total = \App\Anak::count();
                        $first = isset($_GET['page']) && $_GET['page'] != 1 ? (($_GET['page'] * $anak->perPage()) - $anak->perPage()) + 1 : 1 ;
                        $last = $total >= $anak->perPage() && $first + $anak->perPage()  -1 < $total ? $first + $anak->perPage() -1 : $total; 
                    ?>
                    <span ng-bind-html="result_text" class="ng-binding">Menampilkan {{ $total }} profile anak terlantar (<strong>{{ $first }} - {{ $last }}</strong> dari <strong>{{ $total }}</strong>)
                    </span>
                </div>
            </div>
        </div>
        <div class="flex">
            @foreach($anak as $item)
                <section>
                  <img src="/images/anak/{{$item->image}}" alt="Smartphone" />
                  <h3>{{$item->nama_lengkap}}, {!! \Carbon\Carbon::parse($item->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun'); !!}</h3>
                  <p>Deskripsi: {{$item->deskripsi}}</p>
                  <aside>
                    <ul>
                      <li>{!! \App\Province::findOrFail($item->state_id)->name; !!}, {!! \App\Regency::findOrFail($item->city_id)->name; !!}</li>
                    </ul>
                    <ul>
                      <li>{{$item->tanggal_lahir}}</li>
                      <li>{{$item->gender}}</li>
                    </ul>
                    <a href="/anak/{{ $item->id }}" class="button-list-anak">Lihat Profile</a>
                  </aside>
                </section>
            @endforeach
        </div>
        
        <div class="pagination-wrapper"> 
            {!! $anak->appends(['search' => Request::get('search')])->render() !!} 
        </div>
    </section>
</div>
@endsection
