<?php

namespace mvcobjet\Models\Services;

use mvcobjet\Models\Daos\DirectorDao;
use mvcobjet\Models\Entities\Director;

class DirectorService
{
    private $directorDao;

    public function __construct()
    {
        $this->directorDao = new directorDao();
    }

    public function getAlldirecteurs()
    {
        $directeurs = $this->directorDao->findAll();
        return $directeurs;
    }
}