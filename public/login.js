userName = document.getElementById('userName')
errorNombre = document.getElementById('errorNombre')

userName.addEventListener('input', (e) => {
    if (e.target.value.length > 20 || e.target.value.length == 0) {
        errorNombre.classList.remove('d-none');
    } else {
        errorNombre.classList.add('d-none');
    }
})
