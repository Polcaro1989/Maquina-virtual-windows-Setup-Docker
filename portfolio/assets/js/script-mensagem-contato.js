document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        Toastify({
            text: 'Entre em contato comigo!',
            gravity: 'top',
            duration: 5000,
            className: 'custom-toast',
            backgroundColor: 'red',
        }).showToast();
    }, 5000);
});

document.addEventListener('DOMContentLoaded', function() {
    setInterval(function() {
        Toastify({
            text: 'Deixe sua mensagem em breve lhe retorno..',
            gravity: 'bottom',
            duration: 5000,
            className: 'custom-toast-green',
            backgroundColor: 'green',
        }).showToast();
    }, 100000);
});