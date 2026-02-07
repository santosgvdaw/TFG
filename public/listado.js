let listado = document.getElementById('listado');

listado.addEventListener('click', e => {
    const target = e.target.closest('.btn-danger');
    console.log(target);
    if (target) {
        e.preventDefault();
        if (confirm('¿Seguro/a que quiere eliminarlo?')) {
            window.location.href = target.href;
        }
    }
})