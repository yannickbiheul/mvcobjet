<?php

namespace mvcobjet\Models\Entities;

use DateTime;

class Movie {

    private $id;
    private $title;
    private $description;
    private $duration;
    private $date;
    private $coverImage;
    // private $genre;
    // private $director;
    // private $actors;

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId($id): Movie {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Movie
     */
    public function setDescription(string $description): Movie {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDuration(): string {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return Movie
     */
    public function setDuration(string $duration): Movie {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate(): \DateTime {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return Movie
     */
    public function setDate(DateTime $date): Movie {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoverImage(): string {
        return $this->coverImage;
    }

    /**
     * @param string $coverImage
     * @return Movie
     */
    public function setCoverImage(string $coverImage): Movie {
        $this->coverImage = $coverImage;
        return $this;
    }

    
    public function getGenre(): Genre
    {
        return $this->genre;
    }

   
    public function setGenre(Genre $genre): Movie
    {
        $this->genre = $genre;
        return $this;
    }

/*   
    public function getDirector(): Director
    {
        return $this->director;
    }

    
    public function setDirector(Director $director): Movie
    {
        $this->director = $director;
        return $this;
    }
/*

    public function getActors()
    {
        return $this->actors;
    }

    public function setActors($actors): Movie
    {
        $this->actors = $actors;
        return $this;
    }

    public function addActor(Actor $actor): void
    {
       
        foreach ($this->actors as $a) {
            if ($a->getId() == $actor->getId()) {
                return;
            }
        }
        $this->actors[] = $actor;
    }

    public function deleteActor(Actor $actor): void
    {
        $this->actors = array_filter($this->actors, function (Actor $a) use ($actor) {
            return $a->getId() != $actor->getId();
        });
    }
*/
}
