$(document).ready(function () {
    $barraMenu = $('.menu');
    $barraMenu.pushpin({ top: $barraMenu.offset().top });
    $('.sidenav').sidenav();
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

function Mensagem(msg,  tipo = "info") {

    switch (tipo.toLowerCase()) {
        case 'sucesso':
            M.toast({
                html: msg,
                classes: 'green',
                displayLength : 6000
            })
            break;
        case 'info':
            M.toast({
                html: msg,
                classes: 'light-blue accent-4',
                displayLength : 6000
            })
            break;
        case 'aviso':
            M.toast({
                html: msg,
                classes: 'yellow accent-4',
                displayLength : 6000
            })
            break;
        case 'erro':
            M.toast({
                html: msg,
                classes: 'red',
                displayLength : 6000
            })
            break;
        default:
            M.toast({
                html: msg,
                classes: 'green',
                displayLength : 6000
            })
            break;
    }
}