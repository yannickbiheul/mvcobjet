<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Genre;

class GenreDao extends BaseDao {
   
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM genre ");
        $res = $stmt->execute();
        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $genres[] = $this->createObjectFromFields($row);
            }
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id): Genre {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res){
            return $stmt->fetchObject(Genre::class); 
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields): genre {
        $genre = new genre();
        $genre->setId($fields['id'])
              ->setname($fields['name']);           

        return $genre;
    }

}
