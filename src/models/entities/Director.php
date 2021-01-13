<?php

namespace mvcobjet\Models\Entities;

class Director {

    protected $id;
    protected $firstName;
    protected $lastName;

    
    public function getId(): int {
        return $this->id;
    }

    
    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    
    public function getFirstName() {
        return $this->firstName;
    }

    
    public function setFirstName(string $firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    
    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName(string $lastName) {
        $this->lastName = $lastName;
        return $this;
    }

}
