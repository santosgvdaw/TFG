let nombre = document.getElementById('nombre')
let errorNombre = document.getElementById('errorNombre')

nombre.addEventListener('input', (e) => {
    errorNombre = document.getElementById('errorNombre')
    if (e.target.value.length > 20 || e.target.value.length == 0) {
        errorNombre.classList.remove('d-none')
    } else {
        errorNombre.classList.add('d-none')
    }
})
