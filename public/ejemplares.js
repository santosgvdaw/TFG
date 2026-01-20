let precio = document.getElementById('precio')
let errorPrecio = document.getElementById('errorPrecio')
let cantidad = document.getElementById('cantidad')
let errorCantidad = document.getElementById('errorCantidad')

precio.addEventListener('input', (e) => {
    errorPrecio = document.getElementById('errorPrecio')
    if (parseFloat(e.target.value) != e.target.value || e.target.value.length == 0) {
        errorPrecio.classList.remove('d-none')
    } else {
        errorPrecio.classList.add('d-none')
    }
})

cantidad.addEventListener('input', (e) => {
    errorCantidad = document.getElementById('errorCantidad')
    if (parseInt(e.target.value) != e.target.value || e.target.value.length == 0 || e.target.value <= 0) {
        errorCantidad.classList.remove('d-none')
    } else {
        errorCantidad.classList.add('d-none')
    }
})
