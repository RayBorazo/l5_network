<!-- app/views/filmCatalog.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="particles-js"></div>
    <script src="js/particles/particles.min.js"></script>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Catálogo de Filmes Star Wars</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
            <?php foreach ($films as $film): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="imagens/films/<?= str_replace(' ', '_', $film->getTitle()) . '.jpg'; ?>" 
                             class="card-img-top" alt="<?= $film->getTitle(); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $film->getTitle(); ?></h5>
                            <p><strong>Data de Lançamento:</strong> <?= $film->getReleaseDate(); ?></p>
                            <a href="index.php?action=getFilmDetails&id=<?= $film->getId(); ?>" class="btn btn-primary">Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>

    document.addEventListener("DOMContentLoaded", function() {
        const linkElement = document.querySelector('link[href="css/style.css"]');
        if (linkElement) {
            console.log("CSS foi carregado com sucesso!");
        } else {
            console.log("O arquivo CSS não foi encontrado ou não foi carregado.");
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
    const cardElements = document.querySelectorAll('.card');
    if (cardElements.length > 0) {
        console.log(`${cardElements.length} cards encontrados na página.`);
    } else {
        console.log("Nenhum card encontrado.");
    }

    const cardTitleElements = document.querySelectorAll('.card-title');
    if (cardTitleElements.length > 0) {
        console.log(`${cardTitleElements.length} títulos de card encontrados.`);
    } else {
        console.log("Nenhum título de card encontrado.");
    }

    const cardImgElements = document.querySelectorAll('.card-img-top');
    if (cardImgElements.length > 0) {
        console.log(`${cardImgElements.length} imagens de card encontradas.`);
    } else {
        console.log("Nenhuma imagem de card encontrada.");
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const firstCard = document.querySelector('.card');
    if (firstCard) {
        const styles = window.getComputedStyle(firstCard);
        console.log("Estilos aplicados ao primeiro card:", styles);
    } else {
        console.log("Não foi possível encontrar o primeiro card.");
    }
});
</script>
    <script>
        particlesJS.load('particles-js', 'js/particles/particles.json', function() {
            console.log('Particles.js carregado com sucesso!');
        });
    </script>
</body>
</html>
