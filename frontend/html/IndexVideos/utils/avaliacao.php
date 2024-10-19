<form id="avaliacaoForm" method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" required>
    </div>
    <div class="form-group">
        <label for="comentario">Comentário:</label>
        <textarea class="form-control" name="comentario" id="comentario" rows="5" placeholder="Deixe seu comentário" required></textarea>
    </div>
    <div class="form-group">
        <label for="avaliacao">Avaliação:</label>
        <div class="rating">
            <input type="radio" id="estrela1" name="avaliacao" value="1">
            <label for="estrela1">1 Estrela</label>
            <input type="radio" id="estrela2" name="avaliacao" value="2">
            <label for="estrela2">2 Estrelas</label>
            <input type="radio" id="estrela3" name="avaliacao" value="3">
            <label for="estrela3">3 Estrelas</label>
            <input type="radio" id="estrela4" name="avaliacao" value="4">
            <label for="estrela4">4 Estrelas</label>
            <input type="radio" id="estrela5" name="avaliacao" value="5">
            <label for="estrela5">5 Estrelas</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
</form>

<div id="mensagem"></div>

<script>
    $(document).ready(function() {
        $('#avaliacaoForm').on('submit', function(event) {
            event.preventDefault(); // Prevenir o comportamento padrão de envio do formulário

            $.ajax({
                url: '../../../php/avaliacao.php', // O destino da requisição
                type: 'POST',
                data: $(this).serialize(), // Pega os dados do formulário
                success: function(response) {
                    $('#mensagem').html('<div class="alert alert-success">Avaliação enviada com sucesso!</div>');
                    $('#avaliacaoForm')[0].reset(); // Limpa o formulário após o sucesso
                },
                error: function(xhr, status, error) {
                    $('#mensagem').html('<div class="alert alert-danger">Ocorreu um erro. Tente novamente.</div>');
                }
            });
        });
    });
</script>