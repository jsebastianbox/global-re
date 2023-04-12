@extends('admin.layout')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/sercop.css') }}">


    {{--datatable--}}
    @include('include.dataTable')


    @section('tab_title')
    <div id="date"></div>
    <script>
        function updateClock() {
            const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre',
                'octubre', 'noviembre', 'diciembre'
            ];
            const days = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];

            const now = new Date();
            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hour = now.getHours().toString().padStart(2, '0');
            const minute = now.getMinutes().toString().padStart(2, '0');
            const second = now.getSeconds().toString().padStart(2, '0');

            const dateString = `Bases de Datos — Clientes Directos | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
    @section('page_title')
    Administración | Clientes Directos
@endsection

    <div id="contentContainer">

        <div class="card mb-5" style="border-radius: 0.5em; padding:0.5em;background-color:#f9f8f6">
            <div class="card-body">
                <form action="{{route('sercorp.store')}}" method="post">
                    @csrf
                    <div class="card-text" style="">
                        <h6 id="chartsTitle" class="mb-5">
                            Agregar Sercop

                            <a href="#clientesDirectosContainer" class="btn btn-info">Ver Registros</a>
                        </h6>

                        <div class="two-sides">
                            <div class="left_side">
                                <div class="input_group2">
                                    <label>Proceso:</label>
                                    <div class="chartsContainer">
                                        <input style="margin-bottom: 0.7rem" placeholder="Código…" name="process_code">
                                        <input placeholder="Enlace…" name="process_link" class="mt-1">
                                    </div>
                                </div>
                                <div class="input_group2">
                                    <label>Objeto:</label>
                                    <textarea name="object" cols="10" rows="2"></textarea>
                                </div>
                                <div class="input_group2">
                                    <label>Fecha Publicación:</label>
                                    <input type="date" name="date_publication" value="{{ date('Y-m-d'); }}">
                                </div>
                                <div class="input_group2">
                                    <label>Adjudicado:</label>
                                    <select name="awardee_id" class="js-example-basic-single select_cedente form-select">
                                    </select>
                                </div>
                                <div class="input_group2">
                                    <label>Alerta:</label>
                                    <select name="coment">
                                        <option value="" selected disabled>Seleccionar</option>
                                        <option value="No empezar">No empezar</option>
                                        <option value="Empezar">Empezar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="right_side">
                                <div class="input_group2">
                                    <label>Entidad:</label>
                                    <input placeholder="…" name="entity">
                                </div>
                                <div class="input_group2">
                                    <label>Prima:</label>
                                    <input type="number" placeholder="$" name="budget" step="any">
                                </div><div class="input_group2">
                                    <label>Status:</label>
                                    <select name="status">
                                        <option value="" selected disabled>Seleccionar</option>
                                        <option value="Desierta">Desierta</option>
                                        <option value="Adjudicado">Adjudicado</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div><div class="input_group2">
                                    <label>Valor Adjudicado:</label>
                                    <input type="number" placeholder="$" name="awardee_value" step="any">
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center">
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>

        <div id="clientesDirectosContainer" class="card mb-5" style="border-radius: 0.5em; padding:2rem;background-color:#f9f8f6">
            <div class="card-body">

                <div class="card-text flexColumnCenterContainer">
                    <h4 id="chartsTitle" class="my-5">Registros</h4>
                    <div style="overflow: auto;max-height:100vh">
                        <table id="sercopTable" class="table table-striped table-hover table-bordered ">
                            <thead style="position: sticky;top:0">
                                <tr>
                                    <th>No. </th>
                                    <th>Proceso</th>
                                    <th>Entidad</th>
                                    <th>Objeto</th>
                                    <th>Prima</th>
                                    <th>Fecha Publicación</th>
                                    <th>Estatus</th>
                                    <th>Adjudicado</th>
                                    <th>Valor Adjudicado</th>
                                    <th>Alerta</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($sercops as $sercop )
                                    <tr>
                                        <td>{{$sercop->id}}</td>
                                        <td>{{$sercop->process_code}}</td>
                                        <td>{{$sercop->entity}}</td>
                                        <td>{{$sercop->object}}</td>
                                        <td>{{$sercop->budget}}</td>
                                        <td>{{$sercop->date_publication}}</td>
                                        <td>{{$sercop->status}}</td>
                                        <td>{{$sercop->awardee_id}}</td>
                                        <td>{{$sercop->awardee_value}}</td>
                                        <td>{{$sercop->alerta}}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <script src="{{ asset('js/admin/database/clientes_directos.js') }}" defer></script>

@endsection
