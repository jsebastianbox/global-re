@extends('admin.layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/admin/administrativo/usuarios.css') }}">

    @include('include.datatable')
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

            const dateString = `Técnico — Gestión de Reaseguros | ${day}, ${date} de ${month} del ${year} ${hour}:${minute}:${second}`;
            document.getElementById('date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
    </script>
@endsection
@section('page_title')
    Administración | Técnico
@endsection

<div class="card text-left">

    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa-solid fa-house"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('management.create') }}"> <i class="fa-solid fa-plus"></i> Crear</a>
            </li>

        </ul>
    </div>
    <div class="card-body">



        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr role="row">
                        <th class="ssorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Order: activate to sort column descending"
                            style="width: 39px;">Order</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                            aria-label="Description: activate to sort column ascending" style="width: 78px;">Asegurado
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                            aria-label="Amount: activate to sort column ascending" style="width: 53px;">% de cobertura
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                            aria-label="Deadline: activate to sort column ascending" style="width: 59px;">Reasegurador
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 43px;">Ramo</th>

                        <th style="text-align: center; width: 42px;" class="sorting_disabled" rowspan="1"
                            colspan="1" aria-label="Add row">

                            Accion
                            {{-- <button type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button> --}}
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr role="row" class="odd">
                        <td class="sorting_1">1</td>
                        <td>Kia</td>
                        <td><span class="badge bg-secondary">40%</span></td>

                        <td>Beazley Group</td>
                        <td>Done</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-xs dt-delete">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>

                    <tr role="row" class="even">
                        <td class="sorting_1">2</td>
                        <td>TV carton</td>
                        <td> <span class="badge bg-success">100%</span></td>

                        <td>Austral Resseguradora S.A.</td>
                        <td>Offer</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-xs dt-delete">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>

                    <tr role="row" class="odd">
                        <td class="sorting_1">3</td>
                        <td>Perez</td>
                        <td><span class="badge bg-secondary">60%</span></td>

                        <td>Beazley Group</td>
                        <td>Done</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-xs dt-delete">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = 'Simple DataTable';
        // DataTable initialisation
        $('#example').DataTable({
            "dom": 'Pfrtip', //solo buscador
            //"dom": 'lrtip',
            //"dom": "Bfrtip",
            //"dom": '<"dt-buttons"Bf><"clear">lirtp',
            "searching": true,
            "paging": false,
            "autoWidth": true,
            "columnDefs": [{
                "orderable": false,
                "targets": 5
            }],
            "buttons": [
                'colvis',
                'copyHtml5',
                'csvHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ]
        });
        //Add row button
        $('.dt-add').each(function() {
            $(this).on('click', function(evt) {
                //Create some data and insert it
                var rowData = [];
                var table = $('#example').DataTable();
                //Store next row number in array
                var info = table.page.info();
                rowData.push(info.recordsTotal + 1);
                //Some description
                rowData.push('New Order');
                //Random date
                var date1 = new Date(2016, 01, 01);
                var date2 = new Date(2018, 12, 31);
                var rndDate = new Date(+date1 + Math.random() * (date2 -
                    date1)); //.toLocaleDateString();
                rowData.push(rndDate.getFullYear() + '/' + (rndDate.getMonth() + 1) + '/' +
                    rndDate.getDate());
                //Status column
                rowData.push('NEW');
                //Amount column
                rowData.push(Math.floor(Math.random() * 2000) + 1);
                //Inserting the buttons ???
                rowData.push(
                    '<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button type="button" class="btn btn-danger btn-xs dt-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'
                );
                //Looping over columns is possible
                //var colCount = table.columns()[0].length;
                //for(var i=0; i < colCount; i++){			}

                //INSERT THE ROW
                table.row.add(rowData).draw(false);
                //REMOVE EDIT AND DELETE EVENTS FROM ALL BUTTONS
                $('.dt-edit').off('click');
                $('.dt-delete').off('click');
                //CREATE NEW CLICK EVENTS
                $('.dt-edit').each(function() {
                    $(this).on('click', function(evt) {
                        $this = $(this);
                        var dtRow = $this.parents('tr');
                        $('div.modal-body').innerHTML = '';
                        $('div.modal-body').append('Row index: ' + dtRow[0]
                            .rowIndex + '<br/>');
                        $('div.modal-body').append('Number of columns: ' +
                            dtRow[0].cells.length + '<br/>');
                        for (var i = 0; i < dtRow[0].cells.length; i++) {
                            $('div.modal-body').append('Cell (column, row) ' +
                                dtRow[0].cells[i]._DT_CellIndex.column +
                                ', ' + dtRow[0].cells[i]._DT_CellIndex.row +
                                ' => innerHTML : ' + dtRow[0].cells[i]
                                .innerHTML + '<br/>');
                        }
                        $('#myModal').modal('show');
                    });
                });
                $('.dt-delete').each(function() {
                    $(this).on('click', function(evt) {
                        $this = $(this);
                        var dtRow = $this.parents('tr');
                        if (confirm("Are you sure to delete this row?")) {
                            var table = $('#example').DataTable();
                            table.row(dtRow[0].rowIndex - 1).remove().draw(
                                false);
                        }
                    });
                });
            });
        });
        //Edit row buttons
        $('.dt-edit').each(function() {
            $(this).on('click', function(evt) {

                $(location).attr('href', 'management/' + 1 + '/edit');
                /* $this = $(this);
                var dtRow = $this.parents('tr');
                $('div.modal-body').innerHTML = '';
                $('div.modal-body').append('Row index: ' + dtRow[0].rowIndex + '<br/>');
                $('div.modal-body').append('Number of columns: ' + dtRow[0].cells.length +
                    '<br/>');
                for (var i = 0; i < dtRow[0].cells.length; i++) {
                    $('div.modal-body').append('Cell (column, row) ' + dtRow[0].cells[i]
                        ._DT_CellIndex.column + ', ' + dtRow[0].cells[i]._DT_CellIndex.row +
                        ' => innerHTML : ' + dtRow[0].cells[i].innerHTML + '<br/>');
                }
                $('#myModal').modal('show'); */
            });
        });
        //Delete buttons
        $('.dt-delete').each(function() {
            $(this).on('click', function(evt) {
                $this = $(this);
                var dtRow = $this.parents('tr');
                if (confirm("Are you sure to delete this row?")) {
                    var table = $('#example').DataTable();
                    table.row(dtRow[0].rowIndex - 1).remove().draw(false);
                }
            });
        });
        $('#myModal').on('hidden.bs.modal', function(evt) {
            $('.modal .modal-body').empty();
        });
    });
</script>

@endsection
