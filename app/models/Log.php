<?php
// app/models/Log.php
class Log {
    public $id;
    public $request_time;
    public $request_url;

    public function __construct($request_time, $request_url) {
        $this->request_time = $request_time;
        $this->request_url = $request_url;
    }

    public static function createLog($request_time, $request_url) {
        // Aqui você pode inserir no banco de dados os logs
        $db = new mysqli('127.0.0.1', 'root', '', 'starwars_api'); 
        // CRIE uma data base chamada "starwars_api"
        // CRIE uma tabela chamada log com os seguintes
        // CREATE TABLE logs (
        // id INT AUTO_INCREMENT PRIMARY KEY,
        // endpoint VARCHAR(255) NOT NULL,
        // method VARCHAR(10) NOT NULL,
        // timestamp DATETIME DEFAULT CURRENT_TIMESTAMP); 
        $query = "INSERT INTO logs (request_time, request_url) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ss", $request_time, $request_url);
        $stmt->execute();
        $stmt->close();
    }
}
?>
