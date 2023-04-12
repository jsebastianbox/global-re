$(document).ready(function () {
    //Solo necesario para el nombre del archivo para exportar.
    //Por defecto es el título de la página.
    document.title = 'Registros Borderaux';
    // Inicialización de la DataTable
    $('#facturas_table').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        "dom": '<"dt-buttons"Bf><"clear">lirtp',
        "paging": true,
        "autoWidth": true,
        "columnDefs": [{
            "orderable": true,
            "targets": 5
        }],
        "buttons": [{
            extend: 'colvis',
            text: 'Mostrar Columnas'
        },
        ]
    });
});

//arraysIds contendría los ids de los registros selccionados
var arrayIds = []

function sendInvoiceId(id) {

    let checkbox = document.getElementById(`${id}checkbox`)

    if (checkbox.checked === true) {
        arrayIds.push(id)
    }
    if (checkbox.checked === false) {
        console.log('falso');
        let index = arrayIds.indexOf(id)
        arrayIds.splice(index, 1)
    }

    $('#showRegister').attr('disabled', false)
    console.log(arrayIds);
}


$(document).ready(function () {
    let buttons = document.querySelectorAll("button[name='editRecordBtn']");

    buttons.forEach((button, idx) => {
        button.addEventListener("click", function (e) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            let install_id = document.querySelectorAll('[name="install_id"]')[idx].innerText;
            console.log(install_id - 1)
            checkboxes.forEach(checkbox => {
                if (!checkbox.checked) {
                    arrayIds = [install_id];
                }
            });
            editRecord(e.target.getAttribute("data-id"));
        });
    });

    document.querySelector('#showRegister').addEventListener('click', e => {
        editRecord();
    });

    function editRecord(id = arrayIds) {

        const recordsData = {
            "borderouxesId": id,
            "idInstall": arrayIds
        };
        var url = `${window.location.origin}/admin/cartera_y_cobranzas/borderaux/item/${id}`;

        $.ajax({
            type: "POST",
            url: `${window.location.origin}/api/filterInstall`,
            data: recordsData,
            dataType: "json",
            success: function (response) {
                sessionStorage.setItem('responseData', JSON.stringify(response.install));
                window.location.href = url;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }
});


/* numeros */
const numberFormatter = Intl.NumberFormat('en-US');

let number_formatter = document.getElementsByClassName('number_formatter');

for (const item of number_formatter) {
    const original_text = item.innerText;
    item.innerText = '$' + numberFormatter.format(original_text);
}
