
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        Toastify({
          text: 'Saiba mais sobre mim!',
          gravity: 'top', 
          duration: 5000, 
          className: 'custom-toast',
          backgroundColor: 'blue', 
        }).showToast();
      }, 5000); 
    });
    document.addEventListener('DOMContentLoaded', function() {
        setInterval(function() {
          Toastify({
            text: 'Mande uma mensagem no chat!',
            gravity: 'bottom', 
            duration: 5000, 
            className: 'custom-toast-green', 
            backgroundColor: 'green', 
          }).showToast();
        }, 50000); 
      });