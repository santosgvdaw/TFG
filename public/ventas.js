let numEjemplares = document.getElementById('numEjemplares')
let ejemplares = document.getElementById('ejemplares')
let btnAddEjemplar = document.getElementById('btnAddEjemplar')

btnAddEjemplar.addEventListener('click', (e) => {
    e.preventDefault();
    numEjemplares.value++;
    // Clona el ejemplar de ejemplo
    let ejemplar = document.getElementById('ejemplar0').cloneNode(true);
    // div
    ejemplar.id = `ejemplar${numEjemplares.value}`;
    ejemplar.classList.remove('d-none');
    // label
    ejemplar.childNodes[1].name = `ejemplar${numEjemplares.value}`;
    // select
    ejemplar.childNodes[3].name = `ejemplar${numEjemplares.value}`;
    ejemplares.appendChild(ejemplar);
})
