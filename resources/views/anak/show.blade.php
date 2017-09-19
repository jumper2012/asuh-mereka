@extends('welcome')
@section('content')
<style>
.carousel-caption {
    text-align: left;
    max-width: 100%;
    width:100%;
    height: 20%;
    background-color: #37474F;
    opacity: 0.6;
    left: 0;
}
.caption-text {
    margin-top: 15px;
    margin-left: 10px;
    font-size: 130%;
}
.information-text {
    font-size: 110%;
}
.information-label {
    font-size: 95%;
}
.peopleCarouselImg img {
  width:100%;
  height: 350px;
  max-height: 350px;
}
.monospaced { 
  font-family: 'Ubuntu Mono', monospaced ; 
  text-align:top;
}
.add-to-cart .btn-qty {
  width: 52px;
  height: 46px;
}
.description-text {
    margin-top: 15px;
    font-size: 110%;
}
#wrapper {
    border: 0.008em solid grey;
    max-height: 0px;
    width: 100%;
    position: relative;
    z-index: 90;
    opacity: 0.3;
}
.row-description {
    margin-top: 7px;
    margin-bottom: 5px;
}
.row-button-asuh-anak {
    margin-top: 20px;
    margin-bottom: 5px;
}
#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  padding : 5px 15px;
}

</style>
<div class="content-wrapper">
    <section class="content">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <h2><strong>{{$anak->nama_lengkap}}</strong></h2>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <span class="label label-primary information-label">Anak Terlantar</span>
                          <span class="label label-success information-label">{!! \Carbon\Carbon::parse($anak->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun'); !!}</span>
                          <span class="label label-warning information-label">No. ID Anak : {{ $anak->id }}</span>
                        </div>
                      </div>
                      <div class="row description-text">
                       <div class="col-md-12">
                        <p class="description">
                         Deskripsi anak : {{$anak->deskripsi}}
                        </p>
                       </div>
                      </div><!-- end row -->
                      <div class="row row-description">
                       <div class="col-md-5">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        <span class="monospaced"><strong>TEMPAT/TANGGAL LAHIR</strong></span>
                       </div>
                       <div class="col-md-7">
                        <span class="monospaced"><strong>{{ \App\Regency::findOrFail($anak->tempat_lahir)->name }}/ {{ $anak->tanggal_lahir }}</strong></span>
                       </div>
                      </div><!-- end row -->
                      <div id="wrapper"></div>
                      <div class="row row-description">
                       <div class="col-md-5">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        <span class="monospaced"><strong>JENIS KELAMIN</strong></span>
                       </div>
                       <div class="col-md-7">
                        <span class="monospaced"><strong>{{ strtoupper($anak->gender) }}</strong></span>
                       </div>
                      </div><!-- end row -->
                      <div id="wrapper"></div>   
                      <div class="row row-description">
                       <div class="col-md-5">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        <span class="monospaced"><strong>AGAMA</strong></span>
                       </div>
                       <div class="col-md-7">
                        <span class="monospaced"><strong>{{ strtoupper($anak->agama) }}</strong></span>
                       </div>
                      </div><!-- end row -->
                      <div id="wrapper"></div>   
                      <div class="row row-description">
                       <div class="col-md-5">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        <span class="monospaced"><strong>SUKU</strong></span>
                       </div>
                       <div class="col-md-7">
                        <span class="monospaced"><strong>{{ strtoupper($anak->suku) }}</strong></span>
                       </div>
                      </div><!-- end row -->
                      <div id="wrapper"></div>   
                      <div class="row row-description">
                       <div class="col-md-5">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                        <span class="monospaced"><strong>PROVINSI/DAERAH TINGGAL</strong></span>
                       </div>
                       <div class="col-md-7">
                        <span class="monospaced"><strong>{{ \App\Province::findOrFail($anak->state_id)->name }}/{{ \App\Regency::findOrFail($anak->city_id)->name }}</strong></span>
                       </div>
                      </div><!-- end row --> 
                      <div class="row row-button-asuh-anak">
                       <div class="col-md-6">
                        <a href="/anak/{{ $anak->id }}" class="button-request-asuh-anak">Request Asuh Anak</a>
                       </div>
                       <div class="col-md-6">
                        <a href="/anak/{{ $anak->id }}" class="button-info-perantara">Info Perantara</a>
                       </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <?php $i = 0; ?>
                              @foreach($foto_caption as $item)
                              <li data-target="#myCarousel" data-slide-to="{{$i+1}}"></li>
                              @endforeach
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                              <div class="item peopleCarouselImg active">
                                <img class="peopleCarouselImg image-responsive" src="/images/anak/{{$anak->image}}" alt="Los Angeles">
                              </div>
                              @foreach($foto_caption as $item)
                              <div class="item peopleCarouselImg">
                                <img class="peopleCarouselImg image-responsive" src="/images/anak/keterangan/{{$anak->id}}/{{$item->image}}" alt="Chicago">
                                    <div class="carousel-caption">
                                        <strong class="caption-text">{{ $item->caption }}</strong>
                                    </div>
                              </div>
                              @endforeach
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
            <div class="container"><h2>Detail Anak</h2></div>
      <div id="exTab3" class="container"> 
      <ul  class="nav nav-pills">
            <li class="active">
              <a  href="#1b" data-toggle="tab">Data Orangtua</a>
            </li>
            <li><a href="#2b" data-toggle="tab">History Akademik Anak</a>
            </li>
          </ul>

            <div class="tab-content clearfix">
              <div class="tab-pane active" id="1b">
                <h3>Same as example 1 but we have now styled the tab's corner</h3>
              </div>
              <div class="tab-pane" id="2b">
                <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
              </div>
            </div>
        </div>    
        </div>
      </div>

    </section>
</div>
@endsection
