{{-- <script src="{{ asset('js/admin/tecnico/cobrokerajes/instalamentos.js') }}" defer></script> --}}

<div class="table-responsive centerContainer">
    <table class="tableStyle" id="instalamentos-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Primas Brutas</th>
                <th scope="col">Impuestos / Deducciones</th>
                <th scope="col">Prima Neta Reaseguros</th>
                <th scope="col">No. Instalamentos</th>
                <th scope="col">No. Días</th>
                <th scope="col">Fecha pago instalamentos</th>
                <th scope="col">% de Comisión</th>
                <th scope="col">Comisión total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="instalamento-body">
        </tbody>

        <tfoot id="instalamento-tfoot">
        </tfoot>

    </table>
</div>
