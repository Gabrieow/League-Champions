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
    $busca = strtolower($busca);

    $campeoesTotais = array_filter($campeoesTotais, function ($c) use ($busca) {
        $nome = strtolower($c['nome']);

        // se for array ele procura separando tudo por ',', se for classe procura pela string
        $classe = is_array($c['classe']) 
            ? implode(', ', array_map('strtolower', $c['classe'])) 
            : strtolower($c['classe']);

        return strpos($nome, $busca) !== false || strpos($classe, $busca) !== false;
    });
}
?>

<link rel="stylesheet" href="assets/style.css"> 

<div class="wrapper">
    <main style="padding: 30px;" id='main-index'>
        <div class="container-index">
            <h1 id='index-texto-principal'>ESCOLHA SUA LENDA</h1>
            <!-- Busca -->
            <form method="GET" class="form-busca">
                <input type="text" name="busca" placeholder="Buscar campeão..." class="input-busca" value="<?= htmlspecialchars($busca) ?>">
                <button type="submit" class="btn-busca">Buscar</button>
            </form>

            <!-- Grid de cards -->
            <section id ='section-cardChamp'>
                <?php foreach ($campeoesTotais as $index => $c): ?>
                    <div class="card-campeao">
                        <input type="checkbox" id="toggle-<?= $index ?>" class="toggle-checkbox">
                        <label for="toggle-<?= $index ?>" class="cabecalho">
                            <img src="<?= $c['imagem'] ?>" alt="<?= $c['nome'] ?>" id='card-image'>
                            <h3><?= htmlspecialchars($c['nome']) ?></h3>
                        </label>
                        <div class="descricao">
                            <h2><?= htmlspecialchars($c['subtitulo']) ?></h2>
                            <br>
                            <p><?= htmlspecialchars($c['descricao']) ?></p>
                            <br>
                            <h3>Classe: <?= is_array($c['classe']) 
                                ? htmlspecialchars(implode(', ', $c['classe'])) 
                                : htmlspecialchars($c['classe']) ?>
                            </h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </main>
</div>

<?php include 'includes/footer.php'; ?>