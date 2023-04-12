var isMobile = false; //initiate as false
// device detection
if (
    /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(
        navigator.userAgent
    ) ||
    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        navigator.userAgent.substr(0, 4)
    )
) {
    isMobile = true;
}

if (isMobile) {
    let modal_button = document.querySelectorAll(".modal-overlay");
    modal_button.forEach((element) => {
        element.removeAttribute("onclick");
    });
}

/* Scripts for css grid dashboard */

$(document).ready(() => {
    addResizeListeners();
    setSidenavListeners();
    setUserDropdownListener();
    // renderChart();
    setMenuClickListener();
    setSidenavCloseListener();
});

// Set constants and grab needed elements
const sidenavEl = $(".sidenav");
const gridEl = $(".grid");
const SIDENAV_ACTIVE_CLASS = "sidenav--active";
const GRID_NO_SCROLL_CLASS = "grid--noscroll";

function toggleClass(el, className) {
    if (el.hasClass(className)) {
        el.removeClass(className);
    } else {
        el.addClass(className);
    }
}

// User avatar dropdown functionality
function setUserDropdownListener() {
    const userAvatar = $(".header__avatar");

    userAvatar.on("click", function (e) {
        const dropdown = $(this).children(".dropdown");
        toggleClass(dropdown, "dropdown--active");
    });
}

// Sidenav list sliding functionality
function setSidenavListeners() {
    const subHeadings = $(".navList__subheading");
    // console.log('subHeadings: ', subHeadings);
    const SUBHEADING_OPEN_CLASS = "navList__subheading--open";
    const SUBLIST_HIDDEN_CLASS = "subList--hidden";

    subHeadings.each((i, subHeadingEl) => {
        $(subHeadingEl).on("click", (e) => {
            const subListEl = $(subHeadingEl).siblings();

            // Add/remove selected styles to list category heading
            if (subHeadingEl) {
                toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
            }

            // Reveal/hide the sublist
            if (subListEl && subListEl.length === 1) {
                toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
            }
        });
    });
}

// Draw the chart
// function renderChart() {
//     const chart = AmCharts.makeChart("chartdiv", {
//         "type": "serial",
//         "theme": "light",
//         "dataProvider": [{
//             "month": "Jan",
//             "visits": 2025
//         }, {
//             "month": "Feb",
//             "visits": 1882
//         }, {
//             "month": "Mar",
//             "visits": 1809
//         }, {
//             "month": "Apr",
//             "visits": 1322
//         }, {
//             "month": "May",
//             "visits": 1122
//         }, {
//             "month": "Jun",
//             "visits": 1114
//         }, {
//             "month": "Jul",
//             "visits": 984
//         }, {
//             "month": "Aug",
//             "visits": 711
//         }, {
//             "month": "Sept",
//             "visits": 665
//         }, {
//             "month": "Oct",
//             "visits": 580
//         }],
//         "valueAxes": [{
//             "gridColor": "#FFFFFF",
//             "gridAlpha": 0.2,
//             "dashLength": 0
//         }],
//         "gridAboveGraphs": true,
//         "startDuration": 1,
//         "graphs": [{
//             "balloonText": "[[category]]: <b>[[value]]</b>",
//             "fillAlphas": 0.8,
//             "lineAlpha": 0.2,
//             "type": "column",
//             "valueField": "visits"
//         }],
//         "chartCursor": {
//             "categoryBalloonEnabled": false,
//             "cursorAlpha": 0,
//             "zoomable": false
//         },
//         "categoryField": "month",
//         "categoryAxis": {
//             "gridPosition": "start",
//             "gridAlpha": 0,
//             "tickPosition": "start",
//             "tickLength": 20
//         },
//         "export": {
//             "enabled": false
//         }
//     });
// }

function toggleClass(el, className) {
    if (el.hasClass(className)) {
        el.removeClass(className);
    } else {
        el.addClass(className);
    }
}

// If user opens the menu and then expands the viewport from mobile size without closing the menu,
// make sure scrolling is enabled again and that sidenav active class is removed
function addResizeListeners() {
    $(window).resize(function (e) {
        const width = window.innerWidth;
        console.log("width: ", width);

        if (width > 750) {
            sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
            gridEl.removeClass(GRID_NO_SCROLL_CLASS);
        }
    });
}

// Menu open sidenav icon, shown only on mobile
function setMenuClickListener() {
    $(".header__menu").on("click", function (e) {
        console.log("clicked menu icon");
        toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
        toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
    });
}

// Sidenav close icon
function setSidenavCloseListener() {
    $(".sidenav__brand-close").on("click", function (e) {
        toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
        toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
    });
}

// Modals

var elements = $(".modal-overlay, .modal");

$("button").click(function () {
    elements.addClass("active");
});

$(".close-modal").click(function () {
    elements.removeClass("active");
});

// Add class if panel open
let navegacion = document.querySelectorAll(".navList__subheading");
let sublist = document.querySelectorAll(".sublist");

/**
 * Comenté esta función porque daba problemas con los estilos en comercial. Si algo falla, descomentar la función.
 */

// $(document).ready(function () {
//     navegacion.forEach((element) => {
//         if (window.location.href.indexOf("/admin/comercial/") > -1) {
//             element.classList.add("navList__subheading--open");
//             element.children[1].classList.remove("sublist--hidden");
//         } else {
//             element.classList.remove("navList__subheading--open");
//             element.children[1].classList.add("sublist--hidden");
//         }
//     });
// });

//Para los select2

// function select2(selector, apiDeseada) {
//     $(document).ready(function () {
//         $(`${selector}`).select2({
//             placeholder: 'Selecciona',
//             minimumInputLength: 1,
//             ajax: {
//                 url: `${window.location.origin}/api/${apiDeseada}`,
//                 dataType: 'json',
//                 delay: 250,
//                 processResults: function (data) {
//                     return {
//                         results: data
//                     };
//                 },
//                 cache: true
//             }
//         });
//     });
// }

// function searchableSelect2(selector, apiDeseada) {
//     $(`${selector}`).select2({
//         placeholder: 'Search for a city',
//         ajax: {
//             url: `${window.location.origin}/api/${apiDeseada}`,
//             dataType: 'json',
//             delay: 250,
//             data: function (params) {
//                 return {
//                     q: params.term, // Termino a buscar por el usuario
//                     type: 'like',
//                 };
//             },
//             processResults: function (data) {
//                 var results = [];
//                 $.each(data.list, function (index, item) {
//                     results.push({
//                         id: item.id,
//                         text: item.name
//                     });
//                 });
//                 return {
//                     results: results
//                 };
//             },
//             cache: true
//         }
//     });
// }

// function countrySelect() {
//     $(document).ready(function () {
//         // Initialize Select2 on the country select element
//         $('#country_select').select2({
//             placeholder: 'Seleccionar',
//             ajax: {
//                 url: '/countries',
//                 dataType: 'json',
//                 delay: 250,
//                 data: function (params) {
//                     return {
//                         q: params.term
//                     };
//                 },
//                 processResults: function (data) {
//                     var results = [];
//                     $.each(data, function (index, item) {
//                         results.push({
//                             id: item.id,
//                             text: item.name
//                         });
//                     });
//                     return {
//                         results: results
//                     };
//                 },
//                 cache: true
//             }
//         });

//         let selectedCountry = $('#country_select').select2('data')[0];
//         if (!selectedCountry) {
//             alert('Por favor, selecciona un país.');
//             return;
//         }
//         // Chequea si el país seleccionado se encuentra en la base de datos
//         $.get('/countries/' + selectedCountry.id, function (data) {
//             // Si el país no existe, agrega a la base de datos
//             if (!data) {
//                 $.post('/countries', { name: selectedCountry.text }, function (response) {
//                     if (response.success) {
//                         alert('¡País guardado exitosamente!');
//                     } else {
//                         alert('Error al crear país: ' + response.error);
//                     }
//                 });
//             }
//             // Submit el form con el country ID seleccionado
//             $('#country_select').val(selectedCountry.id);
//         });
//     });
// }
