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




}
