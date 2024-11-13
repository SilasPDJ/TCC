function elementsEffect(...args) {
  document.addEventListener('DOMContentLoaded', function () {
    const elementsClasName = Array.from(args);
    elementsClasName.forEach(className => {
      const element = document.getElementsByClassName(className)[0];
      if (element) {
        // Definindo os estilos diretamente no JavaScript
        element.style.transition = 'transform 1s ease-in-out';
        element.style.visibility = 'hidden';
        element.style.transform = 'translateX(-300px)';

        const showElement = () => {
          element.style.visibility = 'visible';
          element.style.transform = 'translateY(0)';
        };

        const hideElement = () => {
          element.style.visibility = 'hidden';
          element.style.transform = 'translateX(-300px)';
        };

        const observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              showElement();
            } else {
              hideElement();
            }
          });
        });

        observer.observe(element);
        setTimeout(() => showElement(), 5000);
      }
    });
  });
}
$(document).ready(function () {
  $('.js-example-basic-single').select2();
});