function confirmDelete(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Está seguro?',
        icon: 'warning',
        cancelButtonText: 'No',
        confirmButtonText: 'Sí',
    }).then((result) => {
        if (result.value) {
            // Al confirmar que se desea eliminar
            form.submit();
        }
    })
}