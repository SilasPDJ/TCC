function toggleDescricao(descricaoId) {
  const opcoes = ['visao-geral', 'avaliacoes', 'descricao'];

  opcoes.forEach(id => {
    const descricaoElement = document.getElementById('descricao-' + id);
    const clickedLink = document.querySelector(`a[onclick="toggleDescricao('${id}')"]`);
    if (id === descricaoId) {
      descricaoElement.style.display = descricaoElement.style.display === 'block' ? 'none' : 'block';
      clickedLink.classList.toggle('active', descricaoElement.style.display === 'block');
    } else {
      descricaoElement.style.display = 'none';
      clickedLink.classList.remove('active');
    }
  });
}

