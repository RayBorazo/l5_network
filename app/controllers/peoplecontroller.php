<?php
// app/controllers/PeopleController.php
include_once(__DIR__ . '/../models/People.php');  // Certifique-se de ter o modelo People

class PeopleController {

    // Método para obter detalhes de um personagem específico
    public function getPersonDetails($id) {
        // URL da API de detalhes de personagens (usando o ID para pegar os dados específicos)
        $url = "https://swapi.py4e.com/api/people/{$id}/";
    
        // Definir um contexto de stream sem verificação SSL
        $options = stream_context_create([
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            ]
        ]);
    
        // Usar file_get_contents com o contexto
        $response = file_get_contents($url, false, $options);
        if ($response === false) {
            die('Erro ao buscar detalhes do personagem.');
        }
        $person = json_decode($response);
        
        include_once(__DIR__ . '/../views/personDetails.php');
    }
}
?>
