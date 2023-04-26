<style>
    hr {
        background-color: darkgrey;
        width: 70%
    }

    .select2 {
        max-width: min-content;
    }

    .select2-container--default .select2-selection--single {
        height: 2.35rem;
    }

    /* .select2-container--open .select2-dropdown--below {
        margin-top: 1.3rem;
    } */

    form select {
        background: transparent;
    }
</style>



{{-- Vida y accidentes personales --}}
{{-- completo --}}
@include('admin.comercial.vida_forms')

{{-- Propiedad activos fijos --}}
{{-- completo --}}
@include('admin.comercial.activos_fijos_form')

{{-- Vehículos --}}
{{-- completo --}}
@include('admin.comercial.vehiculos_form')

{{-- Ramos Técnicos --}}
{{-- incompleto --}}
@include('admin.comercial.ramos_tecnicos_form')

{{-- Energía --}}
{{-- completo --}}
@include('admin.comercial.energia_form')

{{-- Marítimo --}}

{{-- Casco y máquina || Responsabilidad Civil --}}
{{-- completo --}}
@include('admin.comercial.maritimo_forms.casco_responsabilidad_form')

{{-- Protection and indemnity P&I --}}
{{-- completo --}}
@include('admin.comercial.maritimo_forms.pi_form')

{{-- RC prtuaria, astilleros, armadores --}}
{{-- completo --}}
@include('admin.comercial.maritimo_forms.rc_forms')

{{-- Transporte --}}
{{-- completo --}}
@include('admin.comercial.maritimo_forms.transporte_forms')


{{-- Aviación --}}

{{-- Casco aéreo && Responsabilidad Civil --}}
{{-- completo --}}
@include('admin.comercial.aviacion_forms.casco_rc_form')

{{-- Pérdida de licencia --}}
{{-- completo --}}
@include('admin.comercial.aviacion_forms.perdida_licencia_form')

{{-- RC Aeroportuaria && RC Hangares && ARIEL --}}
{{-- completo Aeroportuaria --}}
@include('admin.comercial.aviacion_forms.rc_form')

{{-- Responsabilidad Civil --}}
{{-- completo --}}
@include('admin.comercial.responsabilidad_form')

{{-- Riesgos financieros --}}
{{-- completo --}}
@include('admin.comercial.riesgos_form')


{{-- Finanzas --}}

{{-- Fidelidad --}}
{{-- completo --}}
@include('admin.comercial.finanzas.fidelidad_form')

{{-- Seriedad de oferta && Cumplimiento de contrato && Buen uso de anticipo && Ejecucion de obra y buena calidad de materiales && garantías aduaneras && Otras garantías --}}
@include('admin.comercial.finanzas.seriedad_oferta_form')

<script>
    //Form handler for slipApiController submission
    const branchSelector = document.querySelector('[name="branch"]');
    var form = undefined;
    var branch = undefined;
    branchSelector.addEventListener('change', function() {
        switch (this.value) {
            case "s1":
                form = "form.vida";
                branch = "vida";
                break;
            case "s2":
                form = "form.activos";
                branch = "activos";
                break;
            case "s3":
                form = "form.vehiculos";
                branch = "vehiculos";
                break;
            case "s4":
                form = "form.tecnico";
                branch = "tecnico";
                break;
            case "s5":
                form = "form.energia";
                branch = "energia";
                break;
            case "s6":
                branch = "maritimo";
                break;
            case "s7":
                branch = "aviacion";
                break;
            case "s8":
                form = "form.responsabilidad";
                branch = "responsabilidad";
                break;
            case "s9":
                form = "form.riesgos";
                branch = "riesgos";
                break;
            case "s10":
                branch = "fianzas";
                break;

            default:
                break;
        }
    });
    let aviacionSelector = document.querySelector('#cobertura_aviacion');
    let maritimoSelector = document.querySelector('#cobertura_maritimo');
    let fianzasSelector = document.querySelector('#cobertura_finanzas');

    aviacionSelector.addEventListener('change', function() {
        switch (this.value) {
            case 'ca':
            case 'rc':
                form = "form.aviacion";
                break;
            case 'pl':
                form = "form.aviacion2";
                break;
            case 'rca':
            case 'rch':
            case 'ariel':
                form = "form.aviacion3";
                break;
            default:
                break;
        }
    });

    maritimoSelector.addEventListener('change', function() {
        switch (this.value) {
            case 'cm':
            case 'mrc':
                form = "form.maritimo"
                break;
            case 'pi':
                form = "form.maritimo2"
                break;
            case 'rcp':
            case 'rcas':
            case 'rcar':
                form = "form.maritimo3"
                break;
            case 'tin':
            case 'ex':
            case 'im':
            case 'stp':
            case 'td':
                form = "form.transporte"
                break;
            default:
                break;
        }
    });

    fianzasSelector.addEventListener('change', function() {
        switch (this.value) {
            case 'fi':
                form = "form.fianzas"
                break;
            default:
                form = "form.fianzas2"
                break;
        }
    });

    function jqsubmit() {
        $(`${form}`).submit(function(event) {
            event.preventDefault();
            currencyToUSD();
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: window.location.origin + "/api/storeSlip",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Realizado!',
                        text: 'El slip fue cargado correctamente. ¿Qué deseas hacer ahora?',
                        showCancelButton: true,
                        confirmButtonText: 'Crear otro compromiso',
                        cancelButtonText: 'Revisar compromiso',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href =
                                `${window.location.origin}/admin/comercial/new_compromiso`;
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            console.warn(response.id);
                            Swal.fire({
                                icon: 'warning',
                                title: 'Aviso',
                                text: 'Si editas el compromiso nuevamente, éste será enviado al departamento técnico una vez que guardes tus cambios. ¿Deseas continuar?',
                                footer: '<p>Nota: Para evitar que el slip se envíe al departamento técnico, únicamente debes ingresar en otra sección.</p>',
                                showCancelButton: true,
                                confirmButtonText: 'Sí, ¡Redireccióname!',
                                cancelButtonText: 'No, quedarse aquí.',
                                reverseButtons: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        // `${window.location.origin}/admin/comercial/edit_compromiso/${branch}/${slipID}`; //Revisar el slip ID
                                        `${window.location.origin}/admin/compromiso/pending`;
                                } else if (result.dismiss === Swal.DismissReason
                                    .cancel) {
                                    window.location.href = window.location.origin +
                                        `${window.location.origin}/admin/comercial/new_compromiso`;
                                }
                            });
                        }
                    });

                },
                error: function(error) {
                    // Handle an error response
                    console.error(error);
                }
            });
        });
    }
</script>
