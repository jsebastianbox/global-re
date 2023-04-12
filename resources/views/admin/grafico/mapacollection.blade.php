@extends('admin.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/grafico/mapa_colocacion.css') }}">
    <script src="{{ asset('js/admin/grafico/colocacion.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>

    @include('include.datatable')

@section('tab_title')
    <div id="date"></div>
@endsection
@section('page_title')
    Administración | Mapa de Colocación
@endsection



<div class="map_sections">
    <section id="table">
        <div class="title">xxxxxxx - Mapa de Colocación</div>
        <div class="info">
            Vigencia:
            <div class="row">
                <div class="left">Desde:</div>
                <div class="right">2-ago-18</div>
            </div>
            <div class="row">
                <div class="left">Hasta:</div>
                <div class="right">2-ago-19</div>
            </div>
        </div>
        <div class="trow">
            <table id="reinsurer_table" class="tleft">
                <thead>
                    <th>Reasegurador</th>
                    <th>Límite</th>
                    <th>Exceso</th>
                    <th>Participación</th>
                    <th>Registro</th>
                    <th>Calificación</th>
                </thead>
                <tbody>
                    <tr>
                        <td>QBE Ecuador</td>
                        <td>63,000,000.00</td>
                        <td></td>
                        <td>50.00%</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Scor</td>
                        <td>63,000,000.00</td>
                        <td></td>
                        <td>10.00%</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Patria Re</td>
                        <td>63,000,000.00</td>
                        <td></td>
                        <td>7.50%</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Reaseguradora del Ecuador</td>
                        <td>63,000,000.00</td>
                        <td></td>
                        <td>7.50%</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Arch</td>
                        <td>41,300,000.00</td>
                        <td>-</td>
                        <td>3.00%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>R&S</td>
                        <td>41,300,000.00</td>
                        <td>-</td>
                        <td>3.50%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Geospecial</td>
                        <td>41,300,000.00</td>
                        <td>-</td>
                        <td>10.00%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Channel</td>
                        <td>10,000,000.00</td>
                        <td>-</td>
                        <td>10.00%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Agnew</td>
                        <td>31,300,000.00</td>
                        <td>10,000,000.00</td>
                        <td>8.00%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Chaucer</td>
                        <td>28,000,000.00</td>
                        <td>41,300,000.00</td>
                        <td>15.00%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Agnew</td>
                        <td>28,000,000.00</td>
                        <td>41,300,000.00</td>
                        <td>9.00%</td>
                        <td>1-0242-00</td>
                        <td>A</td>
                    </tr>
                </tbody>
            </table>
            <table id="info_table" class="tright">
                <thead>
                    <th></th>
                    <th>99.00%</th>
                    <th>99.00%</th>
                    <th>99.00%</th>
                    <th>99.00%</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>41.3 mm</td>
                        <td>10 mm</td>
                        <td>31.3 mm xs 10 mm</td>
                        <td>28 mm xs 41.3 mm</td>
                    </tr>
                    <tr>
                        <td>QBE Ecuador</td>
                        <td>50.00%</td>
                        <td>50.00%</td>
                        <td>50.00%</td>
                        <td>50.00%</td>
                    </tr>
                    <tr>
                        <td>Scor</td>
                        <td>10.00%</td>
                        <td>10.00%</td>
                        <td>10.00%</td>
                        <td>10.00%</td>
                    </tr>
                    <tr>
                        <td>Patria Re</td>
                        <td>7.50%</td>
                        <td>7.50%</td>
                        <td>7.50%</td>
                        <td>7.50%</td>
                    </tr>
                    <tr>
                        <td>Reaseguradora del Ecuador</td>
                        <td>7.50%</td>
                        <td>7.50%</td>
                        <td>7.50%</td>
                        <td>7.50%</td>
                    </tr>
                    <tr>
                        <td>Arch</td>
                        <td>3.00%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>R&S</td>
                        <td>3.50%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Geospecial</td>
                        <td>10.00%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Channel</td>
                        <td></td>
                        <td>8.00%</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Agnew</td>
                        <td></td>
                        <td></td>
                        <td>8.00%</td>
                        <td>9.00%</td>
                    </tr>
                    <tr>
                        <td>Chaucer</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>15.00%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section id="chart">
        <canvas id="mapa-colocacion"></canvas>
    </section>
</div>

@endsection
