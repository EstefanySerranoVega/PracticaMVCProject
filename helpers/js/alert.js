/*
Swal.fire({
    title: "Bienvenido, ahre",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Yes',
    denyButtonText: 'No',
});

-redirect hero del home-
<?php echo URL_RAIZ;?>viewProducto?id=<?php echo $sl[0]['id_p'];?>
*/
console.log('default document alert en ejecucion');

Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Accion realizada exitosamente',
    showConfirmButton: false,
    timer: 1500
});


function prueba() {
    Swal.fire({
        title: "Bienvenido, ahre",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        timer: 5000
    });
}

function showMessage() {
    console.log('funcion show message en ejecucion');
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Alerta exitosa!',
        showConfirmButton: false,
        timer: 1500
    })
}