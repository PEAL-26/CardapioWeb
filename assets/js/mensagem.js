function Mensagem(msg, tipo = "info") {

    switch (tipo.toLowerCase()) {
        case 'sucesso':
            M.toast({
                html: msg,
                classes: 'green',
                displayLength: 6000
            })
            break;
        case 'info':
            M.toast({
                html: msg,
                classes: 'light-blue accent-4',
                displayLength: 6000
            })
            break;
        case 'aviso':
            M.toast({
                html: msg,
                classes: 'yellow accent-4',
                displayLength: 6000
            })
            break;
        case 'erro':
            M.toast({
                html: msg,
                classes: 'red',
                displayLength: 6000
            })
            break;
        default:
            M.toast({
                html: msg,
                classes: 'green',
                displayLength: 6000
            })
            break;
    }
}