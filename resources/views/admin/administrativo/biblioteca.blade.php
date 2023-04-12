@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/biblioteca.css') }}">
    <script src="{{ asset('js/admin/administrativo/biblioteca.js') }}" defer></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

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

        const dateString = `Biblioteca | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
        document.getElementById('date').textContent = dateString;
    }
    setInterval(updateClock, 1000);
</script>
@endsection
@section('page_title')
    Administración | Biblioteca
@endsection

<div id="contentContainer">
    <div class="chartsContainer">
        <div id="myChartContainer">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home"
                                aria-selected="true">Diccionario</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Cláusulas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Coberturas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Endosos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Formularios</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">
                                    <section>
                                        <div id="dropzone">
                                            <form class="dropzone needsclick" id="demo-upload" action="/upload">
                                                @csrf
                                                <div class="dz-message needsclick">
                                                    Arrastra tus archivos aquí o da clic para cargar.<br>
                                                    {{-- <span class="note needsclick">(This is just a demo dropzone. Selected
                                                files are <strong>not</strong> actually uploaded.)</span> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <section>
                                        <div id="dropzone">
                                            <form class="dropzone needsclick" id="demo-upload" action="/upload">
                                                @csrf
                                                <div class="dz-message needsclick">
                                                    Arrastra tus archivos aquí o da clic para cargar.<br>
                                                    {{-- <span class="note needsclick">(This is just a demo dropzone. Selected
                                                    files are <strong>not</strong> actually uploaded.)</span> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="tableQuemada" class="chartsContainer" style="display: none">
        <h4 id="chartsTitle">KIA</h4>
        <table class="cotizadosTable">
            <tr>
                <th>Ramo</th>
                <th>Pais</th>
                <th>Reaseguradores</th>
                <th>Ejecutivo</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VIDA</td>
                <td>Ecuador</td>
                <td>AD</td>
                <td>M. Hernandez</td>
                <td>Orden En firme</td>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VIDA</td>
                <td>Ecuador</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
        </table>
    </div>

    <div id="tableQuemada2" class="chartsContainer" style="display: none">
        <h4 class="chartsTitle">AIG</h4>
        <table class="cotizadosTable">
            <tr>
                <th>Ramo</th>
                <th>Pais</th>
                <th>Reaseguradores</th>
                <th>Ejecutivo</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VIDA</td>
                <td>Ecuador</td>
                <td>AD</td>
                <td>M. Hernandez</td>
                <td>Orden En firme</td>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VIDA</td>
                <td>Ecuador</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
            <tr>
                <td>VH</td>
                <td>Panamá</td>
                <td>AB</td>
                <td>M. Hernandez</td>
                <td>En curso</td>
            </tr>
        </table>
    </div>
</div>
@endsection
