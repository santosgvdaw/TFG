let userName = document.getElementById('userName')
let email = document.getElementById('email')
let errorNombre = document.getElementById('errorNombre')
let errorEmail = document.getElementById('errorEmail')

userName.addEventListener('input', (e) => {
    errorNombre = document.getElementById('errorNombre')
    if (e.target.value.length > 20 || e.target.value.length == 0) {
        errorNombre.classList.remove('d-none')
    } else {
        errorNombre.classList.add('d-none')
    }
})

email.addEventListener('input', (e) => {
    /*
    Un email es una serie de letras y/o numero ademas de la barra baja, es decir, \w que se puede repetir
    de 1 a infinitas veces este también puede contener . o + pero estos no pueden ir seguidos, debe haver
    algún \w entre ellos, es to se puede se hacer poniendo después [\.+]?\w+ y todo esto en un grupo que se
    puede repetir de cero a infinitas veces, con esto un . o + solo puede aparecer seguido de 1 a 0 veces y
    seguido de un \w porque si no el email podría terminar en . o + antes del @, que es lo que se comprueba
    después, luego debe seguir un \w que es mínimo 1 y sin máximo, un punto y un \w que puede ir 1 a infinito
    */
    let emailRegex = /^\w+([\.+]?\w+)*@\w+\.\w+$/;
    errorEmail = document.getElementById('errorEmail')
    if (!emailRegex.test(e.target.value)) {        
        errorEmail.classList.remove('d-none')
    } else {
        errorEmail.classList.add('d-none')
    }
})
