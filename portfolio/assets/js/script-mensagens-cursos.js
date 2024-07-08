
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        Toastify({
          text:' Meus cursos.',
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
          text: 'Aqui eu apresento meus certificados de conclusão de curso.',
          gravity: 'bottom', 
          duration: 5000, 
          className: 'custom-toast-green', 
          backgroundColor: 'green', 
        }).showToast();
      }, 50000); 
    });
