<?php
// app/controllers/FilmController.php
include_once(__DIR__ . '/../models/Film.php');  // Caminho correto para Film.php
include_once(__DIR__ . '/../models/Log.php');   // Caminho correto para Log.php

class FilmController {
    public function getAllFilms() {
        $films = Film::getAllFilms(); // Chama o método Film

        include_once(__DIR__ . '/../views/filmCatalog.php');
    }

    //chama o metodo filmes e detalhes deles
    public function getFilmDetails($id) {
        $films = Film::getAllFilms();
        $selectedFilm = null;
        $filmAge = null;
    
        // Busca o filme pelo ID
        foreach ($films as $film) {
            if ($film->getId() == $id) {
                $selectedFilm = $film;
                $filmAge = $selectedFilm -> calculateFilmAge();
                break;
            }
        }
        // para evitar problema de css
        $options = stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            ]
        ]);
        //chama para evitar o problemas
    $filmData = file_get_contents($id, false, $options);
    if ($filmData === false) {
        die('Erro ao buscar detalhes do filme.');
    }
    $filmData = json_decode($filmData, true);

    echo "<script>console.log('Film Data:', " . json_encode($filmData) . ");</script>";

    if (isset($filmData['characters']) && !empty($filmData['characters'])) {
        $characters = [];

        //busca os personagens pela url 
        foreach ($filmData['characters'] as $characterUrl) {
            $characterData = file_get_contents($characterUrl, false, $options);

            
            if ($characterData !== false) {
                $character = json_decode($characterData, true);
                $characters[] = $character;
            }
        }
    }
    include(__DIR__ . '/../views/filmDetails.php');
}
}
?>
