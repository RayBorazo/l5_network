<?php
// app/controllers/LogController.php
include_once(__DIR__ . '/../models/Log.php'); // Caminho correto para Log.php

class LogController {
    public function logRequest($url) {
        $current_time = date('Y-m-d H:i:s');
        Log::createLog($current_time, $url);
    }
}
?>
