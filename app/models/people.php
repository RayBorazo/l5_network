<?php
// app/models/People.php

class People {
    private $name;
    private $height;
    private $mass;
    private $birth_year;
    private $gender;

    private $url;

    public function __construct($name, $height, $mass, $birth_year, $gender, $url) {
        $this->name = $name;
        $this->height = $height;
        $this->mass = $mass;
        $this->birth_year = $birth_year;
        $this->gender = $gender;
        $this->url = $url;
    }

    // Métodos para acessar as propriedades
    public function getName() {
        return $this->name;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getMass() {
        return $this->mass;
    }

    public function getBirthYear() {
        return $this->birth_year;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getUrl() {
        return $this->url;
    }

    // Função para obter todos os personagens da API
    public static function getAllPeople() {
        $url = 'https://swapi.py4e.com/api/people/';
        $response = @file_get_contents($url);

        if ($response === false) {
            error_log('Erro ao fazer requisição para a API: ' . $url);
            return [];
        }

        $data = json_decode($response, true);

        $peopleList = [];
        if (isset($data['results'])) {
            foreach ($data['results'] as $personData) {
                $peopleList[] = new People(
                    $personData['name'],
                    $personData['height'],
                    $personData['mass'],
                    $personData['birth_year'],
                    $personData['gender'],
                    $personData['url'],
                );
            }
        }

        return $peopleList;
    }
        // Função para buscar uma pessoa pelo URL
        public static function getPersonByUrl($url) {
            $peopleList = self::getAllPeople();
            foreach ($peopleList as $person) {
                if ($person->getUrl() === $url) {
                    return $person;
                }
            }
            return null; 
        }
}
?>
