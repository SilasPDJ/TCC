<?php
require_once('../../php/conexao.php');
require_once('../../php/recuperar_dados_usuario.php');

$isUserLogged = isset($_SESSION['logged_user']);

?>

<!-- AVALIAÇÃO -->
<div id="descricao-avaliacoes" class="descricao-ocultavel" style="display: none;">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Avalie o Conteúdo:</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="../../../php/avaliacao.php">
                    <?php if (!$isUserLogged): ?>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" required>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="comentario">Comentário:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="avaliacao"><strong>Avaliação:</strong></label>
                        <div class="rating">
                            <input type="radio" id="estrela1" name="avaliacao" value="1" required>
                            <label for="estrela1"></label>
                            <input type="radio" id="estrela2" name="avaliacao" value="2" required>
                            <label for="estrela2"></label>
                            <input type="radio" id="estrela3" name="avaliacao" value="3" required>
                            <label for="estrela3"></label>
                            <input type="radio" id="estrela4" name="avaliacao" value="4" required>
                            <label for="estrela4"></label>
                            <input type="radio" id="estrela5" name="avaliacao" value="5" required>
                            <label for="estrela5"></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
                </form>
            </div>
        </div>
    </div>
</div>