let numEjemplares = document.getElementById('numEjemplares')
let contenedorEjemplares = document.getElementById('ejemplares')
let plantilla = document?.getElementById('ejemplar0');
let btnAddEjemplar = document.getElementById('btnAddEjemplar')

btnAddEjemplar.addEventListener('click', (e) => {
    e.preventDefault();
    numEjemplares.value++;
    // Clona el ejemplar de ejemplo
    let ejemplar = plantilla.cloneNode(true);
    // div
    ejemplar.id = `ejemplar${numEjemplares.value}`;
    ejemplar.classList.remove('d-none');
    // label
    ejemplar.querySelector('label').setAttribute('for', `ejemplar${numEjemplares.value}`);
    // select
    ejemplar.querySelector('select').name = `ejemplar${numEjemplares.value}`;
    contenedorEjemplares.appendChild(ejemplar);
})

contenedorEjemplares.addEventListener('click', (e) => {
    e.preventDefault();
    if (!e.target.classList.contains('eliminar-ejemplar')) return;

    // obtiene el ejemplar en el que se ha pulsado eliminar
    const ejemplar = e.target.closest('.ejemplar');
    console.log(ejemplar);
    // si no existe sale de la función
    if (!ejemplar) return;

    ejemplar.remove();

    const ejemplares = contenedorEjemplares.querySelectorAll('.ejemplar');

    let id = 1;

    ejemplares.forEach(ejemplar => {
        ejemplar.id = `ejemplar${id}`;

        const label = ejemplar.querySelector('label');
        const select = ejemplar.querySelector('select');

        label.setAttribute('for', `ejemplar${id}`);
        select.id = `ejemplar${id}`;
        select.name = `ejemplar${id}`;

        id++;
    });

    numEjemplares.value = ejemplares.length;

})
