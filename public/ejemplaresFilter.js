let resetFilters = document.getElementById('resetFilters')
let ubicacion = document.getElementById('ubicacion')
let categoria = document.getElementById('categoria')

resetFilters.addEventListener('click', (e) => {
    e.preventDefault();
    ubicacion.selectedIndex = 0;
    categoria.selectedIndex = 0;
})
