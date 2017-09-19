<style>
  #map {
    position: relative;
    height: 70%;
    width: 100%;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-right: 0px;
    margin-left: 0px;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<?php //echo"<pre>"; print_r($persebaran_anak); die(); ?>

<script type="text/javascript">
    $(function() {   
    var data_persebaran_anak = <?php Print($persebaran_anak); ?>;
    var data = [
        {
            // Aceh
            "hc-key": "id-ac",
            "value": data_persebaran_anak[0]
        },
        {
            // Sumatera Utara
            "hc-key": "id-su",
            "value": data_persebaran_anak[1]
        },
        {
            // Sumatera Barat
            "hc-key": "id-sb",
            "value": data_persebaran_anak[2]
        },
        {
            // Riau
            "hc-key": "id-ri",
            "value": data_persebaran_anak[3]
        },
        {
            // Kepulauan Riau
            "hc-key": "id-kr",
            "value": data_persebaran_anak[4]
        },
        {
            // Jambi
            "hc-key": "id-ja",
            "value": data_persebaran_anak[5]
        },
        {
            // Bengkulu
            "hc-key": "id-be",
            "value": data_persebaran_anak[6]
        },
        {
            // Sumatera Selatan
            "hc-key": "id-sl",
            "value": data_persebaran_anak[7]
        },
        {
            // Bangka Belitung
            "hc-key": "id-bb",
            "value": data_persebaran_anak[8]
        },
        {
            // Lampung
            "hc-key": "id-1024",
            "value": data_persebaran_anak[9]
        },
        {
            // Banten
            "hc-key": "id-bt",
            "value": data_persebaran_anak[10]
        },
        {
            // Jakarta
            "hc-key": "id-jk",
            "value": data_persebaran_anak[11]
        },
        {
            // Jawa Barat
            "hc-key": "id-jr",
            "value": data_persebaran_anak[12]
        },
        {
            // Jawa Tengah
            "hc-key": "id-jt",
            "value": data_persebaran_anak[13]
        },
        {
            // Jawa Timur
            "hc-key": "id-ji",
            "value": data_persebaran_anak[14]
        },
        {
            // Yogyakarta
            "hc-key": "id-yo",
            "value": data_persebaran_anak[15]
        },
        {
            // Bali
            "hc-key": "id-ba",
            "value": data_persebaran_anak[16]
        },
        {
            // Nusa Tenggara Barat
            "hc-key": "id-nb",
            "value": data_persebaran_anak[17]
        },
        {
            // Nusa Tenggara Timur
            "hc-key": "id-nt",
            "value": data_persebaran_anak[18]
        },
        {
            // Kalimantan Barat
            "hc-key": "id-kb",
            "value": data_persebaran_anak[19]
        },
        {
            // Kalimantan Timur
            "hc-key": "id-ki",
            "value": data_persebaran_anak[20]
        },
        {
            // Kalimantan Tengah
            "hc-key": "id-kt",
            "value": data_persebaran_anak[21]
        },
        {
            // Kalimantan Selatan
            "hc-key": "id-ks",
            "value": data_persebaran_anak[22]
        },
        {
            // Sulawesi Utara
            "hc-key": "id-sw",
            "value": data_persebaran_anak[23]
        },
        {
            // Sulawesi Tengah
            "hc-key": "id-st",
            "value": data_persebaran_anak[24]
        },
        {
            // Gorontalo
            "hc-key": "id-go",
            "value": data_persebaran_anak[25]
        },
        {
            // Sulawesi Barat
            "hc-key": "id-sr",
            "value": data_persebaran_anak[26]
        },
        
        {
            // Sulawesi Selatan
            "hc-key": "id-se",
            "value": data_persebaran_anak[27]
        },
         {
            "hc-key": "id-sg",
            "value": data_persebaran_anak[28]
        },
        {
            // Maluku Utara
            "hc-key": "id-la",
            "value": data_persebaran_anak[29]
        },
        {
            // Maluku
            "hc-key": "id-ma",
            "value": data_persebaran_anak[30]
        },
        {
            // Papua Barat
            "hc-key": "id-ib",
            "value": data_persebaran_anak[31]
        }, 
        {
            // Papua Barat
            "hc-key": "id-pa",
            "value": data_persebaran_anak[32]
        }
    ];

    // Initiate the chart
    $('#map').highcharts('Map', {

        legend: {
            title: {
                text: 'Jumlah anak terlantar'
            },
            align: 'left',
            verticalAlign: 'bottom',
            floating: true,
            layout: 'vertical',
            valueDecimals: 0,
            backgroundColor: 'rgba(255,255,255,0.9)',
            padding: 12,
            itemMarginTop: 0,
            itemMarginBottom: 0,
            symbolRadius: 0,
            symbolHeight: 14,
            symbolWidth: 24
        },
        colorAxis: {
            dataClasses: [{
                to: 50,
                color: 'rgba(19,64,117,0.05)'
            }, {
                from: 50,
                to: 100,
                color: 'rgba(19,64,117,0.2)'
            }, {
                from: 100,
                to: 200,
                color: 'rgba(19,64,117,0.4)'
            }, {
                from: 200,
                to: 400,
                color: 'rgba(19,64,117,0.5)'
            }, {
                from: 400,
                to: 500,
                color: 'rgba(19,64,117,0.6)'
            }, {
                from: 500,
                to: 750,
                color: 'rgba(19,64,117,0.8)'
            }, {
                from: 1000,
                color: 'rgba(19,64,117,1)'
            }]
        },

        title : {
            text : 'Jumlah Anak Terlantar di Indonesia'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'top'
            }
        },
        series : [{
            data : data,
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            name: 'Jumlah Anak',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            },
            tooltip: {
                    valueSuffix: ' Anak'
                }
        }]
    });
});
</script>

@extends('welcome')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-body">
                <center>
                    <div id="map"></div>
                </center>
                </div>
            </div>
        </section>
    </div>
@endsection