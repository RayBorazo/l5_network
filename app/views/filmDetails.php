<!-- app/views/filmDetails.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Filme</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="particles-js"></div>
    <script src="js/particles/particles.min.js"></script>
    <div class="container">
        <h1 style="color:rgb(255, 255, 255);">More Film: <?= $film->getTitle(); ?></h1>
        <div class="card film-card">
            <div class="film-info">
            <img src="imagens/films/<?= str_replace(' ', '_', $film->getTitle()) . '_card.jpg'; ?>" 
                alt="<?= $film->getTitle(); ?>">
                <div>
                <h5 style="font-size: 30px; color:rgb(255, 255, 255);"><?= $film->getTitle(); ?></h5>
                <p><strong>Director:</strong> <?= $film->getDirector(); ?></p>
                <p><strong>Release Date:</strong> <?= $film->getReleaseDate(); ?></p>
                <p><strong>Producer:</strong> <?= $film->getProducer(); ?></p>
                <p><strong>synopsis:</strong> <?= $film->getOpeningCrawl(); ?></p>
                <p><strong>Film Age:</strong> <?= $filmAge['years']; ?> years,<?= $filmAge['months']; ?> months,<?= $filmAge['days']; ?> days </p>
            </div>
        </div>

        <h3 style= " margin: 20px; font-size: 36px; color:rgb(255, 255, 255);">Characters</h3>
        <div class="characters-section">
            <?php foreach ($characters as $character): ?>
                <div class="character-card">
                    <img src="imagens/films/people/<?= str_replace(' ', '_', $character['name']) . '.jpg'; ?>" 
                        alt="<?= htmlspecialchars($character['name']); ?>">
                    <h5 style="color:rgb(255, 255, 255);font-size: 20px;"><?= htmlspecialchars($character['name']); ?></h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>            
    <a href="index.php" class="btn btn-primary mt-4" style="display: block; width: 150px; margin: 10px auto;">Voltar</a>
    </div>

    <script>
        particlesJS.load('particles-js', 'js/particles/particles.json', function() {
            console.log('Particles.js carregado com sucesso!');
        });
    </script>
</body>
</html>