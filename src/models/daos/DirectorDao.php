<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Director;

class directorDao extends BaseDao {
   
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM director ");
        $res = $stmt->execute();
        if ($res) {
            $directors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $directors[] = $this->createObjectFromFields($row);
            }
            return $directors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields) {
        $director = new director();
        $director->setId($fields['id'])
              ->setFirstName($fields['first_name']) 
              ->setLastName($fields['last_name']);         

        return $director;
    }

    public function findByMovie($movieId)
    {
        $stmt = $this->db->prepare("SELECT director.id, director.first_name, director.last_name FROM director INNER JOIN movie ON movie.director_id = director.id WHERE movie.id = :movieId");
        $res = $stmt->execute([':movieId' => $movieId]);

        if ($res) {
            return $stmt->fetchObject(Director::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }




}
