<?php

namespace mvcobjet\Controllers;
// l'espace de nom est le nom de mon projet + le nom du répertoire ou se trouve mpon controleur
// puis commande composer dumpautolaod 
// creation d'un répertoire vendor.composer/autoload.php
// qu'on peut injecter dans le fichier d'index pour chargement automatiquement les librairies
use mvcobjet\Models\Daos\GenreDao;
use mvcobjet\Models\Entities\Genre;

class FrontController
{
    public function index(){
        $genreDao = new GenreDao();
        $genres = $genreDao->findAll();
        foreach($genres as $genre) {
            echo $genre->getName();
        }
    }
}