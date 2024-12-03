$(document).ready(function () {
  // Array de objetos com título, descrição e caminho da imagem
  var items = [
    {
      img: 'img/foto3.jpg',
      titulo: 'Reconhecimento de Gestos em Libras',
      descricao: 'O caminho para uma comunicação mais inclusiva',
      link: '#'
    },
    {
      img: 'img/interprete.jpg',
      titulo: 'Dicionário',
      descricao: 'Explore sinais em Libras e ASL de forma simples e prática.',
      link: 'html/traducao'
    },
    {
      img: 'img/estudo.jpg',
      titulo: 'Aprenda',
      descricao: 'Saiba o caminho da comunicação com pessoas deficientes auditivas.',
      link: 'html/aprenda'
    }
  ];

  // Seleciona o elemento com ID "carousel-inner"
  var $carouselInner = $('#carousel-inner');
  let excludedIndexes = [0]
  // Itera sobre o array e cria cada item do carrossel
  items.forEach(function (item, index) {
    let isActive = index === 0 ? 'active' : ''; // Define o item ativo
    let carouselItem = `
    <div class="carousel-item ${isActive} rounded">
        <img src="${item.img}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block">
            <h3 class="">${item.titulo}</h3>
            <p class="">${item.descricao}</p>
            ${!excludedIndexes.includes(index) ? `
            <a href="${item.link}">
                <button type="button" class="btn btn-outline-secondary slide">Saiba mais</button>
            </a>` : ''}
        </div>
    </div>
`;
    $carouselInner.append(carouselItem);
  });
});
