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

let descripcion = document.getElementById('descripcion')
let errorDescripcion = document.getElementById('errorDescripcion')

descripcion.addEventListener('input', (e) => {
    errorDescripcion = document.getElementById('errorDescripcion')
    if (e.target.value.length > 255 || e.target.value.length == 0) {
        errorDescripcion.classList.remove('d-none')
    } else {
        errorDescripcion.classList.add('d-none')
    }
})

let stockMinimo = document.getElementById('stockMinimo')
let errorStockMinimo = document.getElementById('errorStockMinimo')

stockMinimo.addEventListener('input', (e) => {
    errorStockMinimo = document.getElementById('errorStockMinimo')
    if (parseInt(e.target.value) <= 0) {
        errorStockMinimo.classList.remove('d-none')
    } else {
        errorStockMinimo.classList.add('d-none')
    }
})