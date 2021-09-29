$(document).ready(function() {
    $('.parallax').parallax();
});


function Delete(url) {
    Swal.fire({
        title: 'Tem ceteza que quer remover esse item?',
        text: 'Você não será capaz de recuperar esse item!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, remover!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}