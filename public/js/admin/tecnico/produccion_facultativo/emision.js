const btnQuemado = document.getElementById('btnQuemado')
const tableQuemada = document.getElementById('tableQuemada')
const tableQuemada2 = document.getElementById('tableQuemada2')


function abrirTableQuemada() {
/*  tableQuemada.style.display = 'flex'
 tableQuemada2.style.display = 'none' */
 tableQuemada.classList.toggle('aparece')
}
function abrirTableQuemada2() {
 tableQuemada.style.display = 'none'
 tableQuemada2.style.display = 'flex'
}
 btnQuemado.addEventListener('click', () => abrirTableQuemada())
