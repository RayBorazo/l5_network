<?php
// app/models/Film.php
class Film {
    public $id;
    public $title;
    public $episode_id;
    public $release_date;
    public $director;
    public $producer;
    public $opening_crawl;
    public $characters = [];
    
    public function __construct($id, $title, $episode_id, $release_date, $director, $producer, $opening_crawl,$characters = []) {
        $this->id = $id;
        $this->title = $title;
        $this->episode_id = $episode_id;
        $this->release_date = $release_date;
        $this->director = $director;
        $this->producer = $producer;
        $this->opening_crawl = $opening_crawl;
    }

    public function getId() {
        return $this->id;
    }

    // Outros métodos de acesso (getters) para os outros atributos
    public function getTitle() {
        return $this->title;
    }

    public function getReleaseDate() {
        return $this->release_date;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getProducer() {
        return $this->producer;
    }
    public function getOpeningCrawl() {
        return $this->opening_crawl;
    }
    public static function getAllFilms()
    {
        // URL API
        $api_url = 'https://swapi.py4e.com/api/films/';
    
        // ignora a SSL
        $options = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ]
        ];
    
        //faz requisição
        $context = stream_context_create($options);
        $response = file_get_contents($api_url, false, $context);
    
        // Decodificando a resposta JSON
        $filmsData = json_decode($response, true);
    
        $films = [];
        foreach ($filmsData['results'] as $filmData) {
            $films[] = new Film(
                $filmData['url'],
                $filmData['title'],
                $filmData['episode_id'],
                $filmData['release_date'],
                $filmData['director'],
                $filmData['producer'],
                $filmData['opening_crawl'],
                $filmData['characters']
            );
        }
    
        return $films;
    }
    
    // Função para buscar filmes pela API
    public static function getFilms()
    {
        $url = 'https://swapi.py4e.com/api/films/';
    
        // Criando o contexto de stream para ignorar a verificação do SSL
        $options = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ]
        ];
    
        //faz requisição
        $context = stream_context_create($options);
        $json = file_get_contents($url, false, $context);  // Aqui é feita a requisição
    
        // Verifica a resposta bem-sucedida
        if ($json === false) {
            // Tratar erro, se necessário
            return [];
        }
    
        $data = json_decode($json, true);
        return $data['results'];
    }
    
         // Função para calcular a idade dos filmes
    public function calculateFilmAge() {
        $releaseDate = new DateTime($this->release_date);
        $currentDate = new DateTime();
        $interval = $releaseDate->diff($currentDate);

        return [
            'years' => $interval->y,
            'months' => $interval->m,
            'days' => $interval->d,
        ];
    }
    // Adicione este método à classe Film.php
    public function getCharactersDetails() {
        $charactersDetails = [];
    
// Injetando as URLs dos personagens no console do navegador
echo "<script>console.log('Character URLs: " . json_encode($this->characters) . "');</script>";
    
foreach ($this->characters as $characterUrl) {
    // Fazendo a requisição e obtendo os dados do personagem
    $characterData = json_decode(file_get_contents($characterUrl));
    
    // Se os dados dos personagens forem recebidos com sucesso, logue no console
    if ($characterData) {
        echo "<script>console.log('Character Data: " . json_encode($characterData) . "');</script>";

        $charactersDetails[] = [
            'name' => $characterData->name,
            'height' => $characterData->height,
            'mass' => $characterData->mass,
            'birth_year' => $characterData->birth_year,
            'gender' => $characterData->gender,
            'url' => $characterData->url,
        ];
    } else {
        // Logando erro caso o personagem não seja encontrado
        echo "<script>console.log('Error: Character data not found for URL: " . $characterUrl . "');</script>";
    }
}

return $charactersDetails;
}
}
?>
