let precio = document.getElementById('precio')
let errorPrecio = document.getElementById('errorPrecio')

precio.addEventListener('input', (e) => {
    errorPrecio = document.getElementById('errorPrecio')
    if (parseFloat(e.target.value) != e.target.value || e.target.value.length == 0) {
        errorPrecio.classList.remove('d-none')
    } else {
        errorPrecio.classList.add('d-none')
    }
})
