<?php
session_start();
require_once 'includes/header.php';
require_once 'dados/dadosCampeoes.php';

$campeoesTotais = $campeoes;
if (isset($_SESSION['campeoes']) && is_array($_SESSION['campeoes'])) {
    $campeoesTotais = array_merge($campeoes, $_SESSION['campeoes']);
}

$busca = $_GET['busca'] ?? '';
if ($busca !== '') {
    $campeoesTotais = array_filter($campeoesTotais, function ($c) use ($busca) {
        return stripos($c['nome'], $busca) !== false;
    });
}
?>

<main style="padding: 30px;">
    <div class="container">
        <!-- Busca -->
        <form method="GET" style="text-align: center; margin-bottom: 30px;">
            <input type="text" name="busca" placeholder="Buscar campeão..." 
                style="padding: 10px; width: 300px; border-radius: 5px; border: 1px solid #ccc;"
                value="<?= htmlspecialchars($busca) ?>">
            <button type="submit" style="padding: 10px 20px; margin-left: 10px;">Buscar</button>
        </form>

        <!-- Grid de cards -->
        <section style="display: flex; flex-direction: column; gap: 20px;">
            <?php foreach ($campeoesTotais as $index => $c): ?>
                <div class="card-campeao">
                    <input type="checkbox" id="toggle-<?= $index ?>" class="toggle-checkbox">
                    <label for="toggle-<?= $index ?>" class="cabecalho">
                        <img src="<?= $c['imagem'] ?>" alt="<?= $c['nome'] ?>">
                        <h3><?= htmlspecialchars($c['nome']) ?></h3>
                    </label>
                    <div class="descricao">
                        <p><?= htmlspecialchars($c['descricao']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

<style>
/* Card container */
.card-campeao {
    border: 1px solid #ccc;
    border-radius: 10px;
    background: #fff;
    overflow: hidden;
}

/* Esconde o checkbox */
.toggle-checkbox {
    display: none;
}

/* Estilo do cabeçalho clicável */
.cabecalho {
    cursor: pointer;
    display: block;
    text-align: center;
}
.cabecalho img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
}
.cabecalho h3 {
    margin: 10px 0;
}

/* Descrição fechada por padrão */
.descricao {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-in-out;
    background: #f9f9f9;
    padding: 0 15px;
}

/* Quando o checkbox está marcado, expande a descrição */
.toggle-checkbox:checked + .cabecalho + .descricao {
    max-height: 200px;
    padding: 15px;
}

.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
    border-left: 2px solid #ccc;
    border-right: 2px solid #ccc;
    background: #fff;
}

</style>
