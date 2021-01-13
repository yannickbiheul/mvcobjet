<?php

namespace mvcobjet\Models\Daos;

use mvcobjet\Models\Entities\Movie;

use DateTime;

class MovieDao extends BaseDao {

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM movie WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if ($res) {
            return $this->createObjectFromFields($stmt->fetch(\PDO::FETCH_ASSOC));
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields): Movie {
        $movie = new Movie();
        $movie->setId($fields['id'])
            ->setTitle($fields['title'])
            ->setDescription($fields['description'])
            ->setDate(\DateTime::createFromFormat('Y-m-d', $fields['date']))
            ->setCoverImage($fields['cover_image'])
            ->setDuration($fields['duration']);

        return $movie;
    }
}
